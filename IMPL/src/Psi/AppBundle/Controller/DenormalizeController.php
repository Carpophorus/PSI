<?php
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Psi\AppBundle\Serializer\NameConverter\MatchConverter;
use Psi\AppBundle\Serializer\NameConverter\RunePageConverter;
use Psi\AppBundle\Entity\RunePage;
use Psi\AppBundle\Entity\Rune;

/**
 * @Route("/denormalize")
 */
class DenormalizeController extends Controller
{

    /**
     * Test summoner denormalization
     *  
     * @Route("/summoner", name="denormalize_summoner_action")      
     * @Method({"GET", "POST"})      
     */
    public function testSummonerActon(Request $request)
    {
        $summonerName = "Kingz";

        $requestFactory = $this->get('psi.app.request.factory');

        $apiRequest = $requestFactory->createSummonerRequest([
            "summonerName" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();

        $normalizer = new ObjectNormalizer(null, new MatchConverter(), null, new ReflectionExtractor());
        $serializer = new Serializer([$normalizer]);

        $responseData = $apiResponse->getData();

        $summoner = new \Psi\AppBundle\Entity\Summoner();
        $em = $this->getDoctrine()->getEntityManager();
        if ($existing = $em->getRepository(get_class($summoner))->findOneBy(['externalId' => $responseData['id']])) {
            $summoner = $existing;
        }
        $serializer->denormalize($apiResponse->getData(), "Psi\AppBundle\Entity\Summoner", 'json', ['object_to_populate' => $summoner]);

        $summoner->setUpdatedAt(new \DateTime());
        $summoner->setImportedAt(new \DateTime());
        $this->getDoctrine()->getEntityManager()->persist($summoner);
        $this->getDoctrine()->getEntityManager()->flush();

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }

    /**
     * Denormalize summoner runes.     
     *  
     * @Route("/runes", name="denormalize_runes_action")      
     * @Method({"GET", "POST"})        
     */
    public function testRunesAction(Request $request)
    {
        $summonerName = 68976;

        $requestFactory = $this->get('psi.app.request.factory');

        $apiRequest = $requestFactory->createRuneRequest([
            "summonerId" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $em = $this->getDoctrine()->getManager();
        $summoner = $em->getRepository("Psi\AppBundle\Entity\Summoner")->findOneBy(['externalId' => $summonerName]);

        if ($summoner) {

            $apiManager = $this->get('psi.app.manager.api.response.manager');
            try {
                $em->beginTransaction();
                $runePages = $apiManager->processResponse($apiResponse);
                foreach ($summoner->getRunePages() as $runePage) {
                    $query = $em->createQuery('DELETE FROM Psi\AppBundle\Entity\Rune e WHERE e.runePage = :id');
                    $query->setParameter('id', $runePage->getId());
                    $query->execute();
                }
                $summoner->setRunePages($runePages);
                $em->persist($summoner);
                $em->flush();
                $em->commit();
            } catch (\Exception $e) {
                echo $e->getMessage();
                $em->rollback();
            }
        }

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }

    /**
     * Denormalize summoner masteries.     
     *  
     * @Route("/masteries", name="denormalize_masteries_action")      
     * @Method({"GET", "POST"})        
     */
    public function testMasteriesAction(Request $request)
    {
        $summonerName = 68976;

        $requestFactory = $this->get('psi.app.request.factory');

        $apiRequest = $requestFactory->createMasteryRequest([
            "summonerId" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $em = $this->getDoctrine()->getManager();
        $summoner = $em->getRepository("Psi\AppBundle\Entity\Summoner")->findOneBy(['externalId' => $summonerName]);

        if ($summoner) {

            $apiManager = $this->get('psi.app.manager.api.response.manager');
            try {
                $em->beginTransaction();
                $masteryPages = $apiManager->processResponse($apiResponse);
                foreach ($summoner->getMasteryPages() as $masteryPage) {
                    $query = $em->createQuery('DELETE FROM Psi\AppBundle\Entity\Mastery e WHERE e.masteryPage = :id');
                    $query->setParameter('id', $masteryPage->getId());
                    $query->execute();
                }
                $summoner->setMasteryPages($masteryPages);
                $em->persist($summoner);
                $em->flush();
                $em->commit();
            } catch (\Exception $e) {
                echo $e->getMessage();
                $em->rollback();
            }
        }

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }

    /**
     * Denormalize match.     
     *  
     * @Route("/match", name="denormalize_match_action")      
     * @Method({"GET", "POST"})        
     */
    public function testMatchAction(Request $request)
    {
        $matchId = 1170813669;

        $requestFactory = $this->get('psi.app.request.factory');

        $apiRequest = $requestFactory->createMatchRequest([
            'matchId' => $matchId
        ]);

        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $em = $this->getDoctrine()->getManager();

        $match = $em->getRepository("Psi\AppBundle\Entity\Match")->findOneBy(['externalId' => $matchId]);

        if (!$match) {
            $apiManager = $this->get('psi.app.manager.api.response.manager');
            try {
                $em->beginTransaction();
                $match = $apiManager->processResponse($apiResponse);
                echo "<pre>";
                \Doctrine\Common\Util\Debug::dump($match, 3);
                echo "</pre>";
                $em->persist($match);
                $em->flush();
                $em->commit();
            } catch (\Exception $e) {
                echo $e->getMessage();
                $em->rollback();
            }
        }

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }
}
