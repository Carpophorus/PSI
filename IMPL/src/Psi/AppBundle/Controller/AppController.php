<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psi\AppBundle\Entity\Summoner;
use Psi\AppBundle\Entity\Match;
use Psi\AppBundle\Entity\Participant;
use Psi\AppBundle\Entity\CacheTag;
use Psi\AppBundle\Helper\StaticMasteryHelper;
use Psi\AppBundle\Entity\ChampionMastery;

class AppController extends Controller
{

    /**
     * 
     * @Route("/", name="app_index_action")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_search_action');
        }

        return $this->render(
                'PsiAppBundle:App:index.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * 
     * @Route("/search", name="app_search_action")
     * @param Request $request
     */
    public function searchAction(Request $request)
    {
        return $this->render(
                'PsiAppBundle:App:search.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    protected function processMatch($apiResponse)
    {
        $em = $this->getDoctrine()->getManager();

        $responseData = $apiResponse->getData();

        if (isset($responseData['gameId'])) {
            $existing = $em->getRepository(Match::class)->findOneBy(['externalId' => $responseData['gameId']]);
            if ($existing) {
                return $existing;
            }
        }

        $apiManager = $this->get('psi.app.manager.api.response.manager');
        try {
            $em->beginTransaction();
            $match = $apiManager->processResponse($apiResponse);
            $em->persist($match);
            $em->flush();
            $em->commit();
            return $match;
        } catch (\Exception $e) {
            $em->rollback();
            throw $e;
        }
    }

    protected function getChampionMastery($requestFactory, Participant $participant)
    {
        $em = $this->getDoctrine()->getManager();

        $existing = $em->getRepository(ChampionMastery::class)->findOneBy(['summoner' => $participant->getSummoner()]);
        if ($existing) {
            return $existing;
        }
        $apiManager = $this->get('psi.app.manager.api.response.manager');

        // fetch active match data
        $apiRequest = $requestFactory->createChampionMasteryRequest([
            "summonerId" => rawurlencode($participant->getSummoner()->getExternalId()),
            "championId" => $participant->getChampionId()
        ]);
        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $responseData = $apiResponse->getData();

        if (!isset($responseData['championLevel'])) {
            return;
        }

        try {
            $em->beginTransaction();
            $championMastery = $apiManager->processResponse($apiResponse);
            $em->persist($championMastery);
            $em->flush();
            $em->commit();
            return $championMastery;
        } catch (\Exception $e) {
            $em->rollback();
        }
    }

    protected function getMessagesHtml()
    {
        return $this->renderView(
                'PsiAppBundle:App:_partial/messages.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * Only support ajax search for summoner active match
     * @Route("/search/{summoner}", name="app_search_result_action")
     * @param Request $request
     */
    public function searchPostAction(Request $request)
    {
        $isAjax = $request->isXmlHttpRequest();
        if (!$isAjax) {
            return $this->redirectToRoute('app_search_action');
        }

        $summonerName = $request->get('summoner');

        $em = $this->getDoctrine()->getManager();
        $requestFactory = $this->get('psi.app.request.factory');
        $helper = $this->get('psi.app.request.helper');

        $summoner = $em->getRepository(Summoner::class)->findOneBy(['name' => $summonerName]);

        if (!$summoner) {
            try {
                $summoner = $helper->getSummonerByName($summonerName);
            } catch (\Exception $e) {
                $this->addFlash('error', "Couldn't find a summoner with specified name.");
                return $this->json([
                        'success' => false,
                        'messages' => $this->getMessagesHtml()
                ]);
            }
        }

        // fetch active match data
        $apiRequest = $requestFactory->createActiveGameSpecRequest([
            "summonerId" => rawurlencode($summoner->getExternalId())
        ]);
        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $responseData = $apiResponse->getData();

        // validate response
        if (isset($responseData['gameId'])) {
            try {
                // extract match
                $match = $this->processMatch($apiResponse);

                $staticData = [];
                $staticManager = $this->get("psi.app.manager.static.data.manager");

                foreach ($match->getParticipants() as $participant) {
                    $championId = $participant->getChampionId();

                    // skip duplicates
                    if (isset($staticData['champion'][$championId])) {
                        continue;
                    }

                    $staticData['champion'][$championId] = $staticManager->getStaticData("champion", $championId);
                    $staticData['file']['champion'][$championId] = $staticManager->getStaticFileData("champion", $championId . ".png");
                }

                $content = $this->renderView(
                    'PsiAppBundle:App:_partial/search_result.html.php', [
                    'match' => $match,
                    'static' => $staticData,
                    'router' => $this->container->get('router'),
                ]);



                // attempt to load champion mastery, allow silent fail
                foreach ($match->getParticipants() as $participant) {
                    $this->getChampionMastery($requestFactory, $participant);
                }

                return $this->json([
                        'success' => true,
                        'messages' => $this->getMessagesHtml(),
                        'content' => $content
                ]);
            } catch (\Exception $e) {
                $this->addFlash('error', "An error occured processing your request.");
                return $this->json([
                        'success' => false,
                        'messages' => $this->getMessagesHtml()
                ]);
            }
        }

        $this->addFlash('error', "Couldn't find an active match for summoner.");
        return $this->json([
                'success' => false,
                'messages' => $this->getMessagesHtml(),
        ]);
    }

    /**
     * 
     * @Route("/view/{match}", name="app_match_action")
     * @param Request $request
     */
    public function viewAction(Request $request)
    {
        $matchId = $request->get('match');

        $em = $this->getDoctrine()->getManager();
        $match = $em->getRepository(Match::class)->findOneBy(['id' => $matchId]);

        if (!$matchId || !$match) {
            $this->addFlash('error', "Match with specified Id doesn't exist.");
            return $this->redirectToRoute('app_search_action');
        }

        $staticData = [];
        $staticManager = $this->get("psi.app.manager.static.data.manager");

        foreach ($match->getParticipants() as $participant) {
            $championId = $participant->getChampionId();


            $championMastery = $em->getRepository(ChampionMastery::class)->findOneBy([
                'externalId' => $championId,
                'summoner' => $participant->getSummoner()
            ]);
            $staticData['championMastery'][$participant->getId()] = ($championMastery ? $championMastery->getChampionLevel() : 1);
            $staticData['summoner'][$participant->getId()] = $staticManager->getStaticFileData("profileicon", $participant->getSummoner()->getProfileIconId() . ".png");

            $staticData['spell'][$participant->getId()]['1'] = $staticManager->getStaticFileData('spell', $participant->getSpellId1() . ".png");
            $staticData['spell'][$participant->getId()]['2'] = $staticManager->getStaticFileData('spell', $participant->getSpellId2() . ".png");

            // skip duplicates
            if (isset($staticData['champion'][$championId])) {
                continue;
            }

            $staticData['champion'][$championId] = $staticManager->getStaticData("champion", $championId);
            $staticData['file']['champion'][$championId] = $staticManager->getStaticFileData("champion", $championId . ".png");
        }

        return $this->render(
                'PsiAppBundle:App:view.html.php', [
                'match' => $match,
                'staticData' => $staticData,
                'isLoggedIn' => $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'),
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * @Route("/participant/runes", name="app_participant_rune_action")
     * @param Request $request
     */
    public function participantRuneAction(Request $request)
    {
        $isAjax = $request->isXmlHttpRequest();
        if (!$isAjax) {
            return $this->redirectToRoute('app_search_action');
        }
        $participantId = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $participant = $em->getRepository(Participant::class)->findOneBy(['id' => $participantId]);

        if ($participant) {
            $runePage = $participant->getRunePage();
            $runeData = [];

            $staticManager = $this->get("psi.app.manager.static.data.manager");

            foreach ($runePage->getRunes() as $rune) {
                $runeData[$rune->getSlotId()]['entity'] = $rune;
                $runeData[$rune->getSlotId()]['data'] = $staticManager->getStaticData("rune", $rune->getRuneId());
                $runeData[$rune->getSlotId()]['file'] = $staticManager->getStaticFileData("rune", $rune->getRuneId() . ".png");
            }

            $runesContent = $this->renderView(
                'PsiAppBundle:App:_partial/runes.html.php', [
                'runes' => $runeData,
                'router' => $this->container->get('router'),
            ]);

            return $this->json([
                    'success' => true,
                    'content' => $runesContent
            ]);
        }
    }

    /**
     * @Route("/participant/masteries", name="app_participant_mastery_action")
     * @param Request $request
     */
    public function participantMasteryAction(Request $request)
    {
        $isAjax = $request->isXmlHttpRequest();
        if (!$isAjax) {
            return $this->redirectToRoute('app_search_action');
        }

        $participantId = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $participant = $em->getRepository(Participant::class)->findOneBy(['id' => $participantId]);

        if ($participant) {
            $masteryPage = $participant->getMasteryPage();
            $masteryData = [];
            $staticFileData = [];

            $staticManager = $this->get("psi.app.manager.static.data.manager");

            $cacheTags = $em->getRepository(CacheTag::class)->createQueryBuilder('c')
                ->where('c.tag LIKE :tag')
                ->setParameter('tag', 'mastery_%')
                ->getQuery()
                ->getResult();
            $staticData = [];
            foreach ($cacheTags as $cacheTag) {
                $tag = $cacheTag->getTag();
                $_temp = explode('_', $tag);
                $masteryId = end($_temp);
                $staticData[$masteryId] = $staticManager->getStaticData("mastery", $masteryId);
                $staticFileData[$masteryId] = $staticManager->getStaticFileData("mastery", $masteryId . ".png");
            }


            foreach ($masteryPage->getMasteries() as $mastery) {
                $masteryData[$mastery->getExternalId()]['entity'] = $mastery;
                $masteryData[$mastery->getExternalId()]['data'] = $staticManager->getStaticData("mastery", $mastery->getExternalId());
            }

            $masteryContent = $this->renderView(
                'PsiAppBundle:App:_partial/masteries.html.php', [
                'masteries' => $masteryData,
                'staticData' => $staticData,
                'fileData' => $staticFileData,
                'binding' => StaticMasteryHelper::getStaticBindings(),
                'router' => $this->container->get('router'),
            ]);

            return $this->json([
                    'success' => true,
                    'content' => $masteryContent
            ]);
        }
    }
}
