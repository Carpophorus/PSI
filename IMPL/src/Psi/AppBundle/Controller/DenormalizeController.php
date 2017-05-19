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

        $requestFactory = $this->get('n2m.request.factory');

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
     * Gets summoner runes.     
     *  
     * @Route("/runes", name="denormalize_runes_action")      
     * @Method({"GET", "POST"})        
     */
    public function testRunesAction(Request $request)
    {
        $summonerName = 68976;

        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createRuneRequest([
            "summonerId" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();

        $responseData = $apiResponse->getData();
        $em = $this->getDoctrine()->getManager();
        $summoner = $em->getRepository("Psi\AppBundle\Entity\Summoner")->findOneBy(['externalId' => $summonerName]);

        if ($summoner) {
            $normalizer = new ObjectNormalizer(null, new RunePageConverter(), null, new ReflectionExtractor());
            $serializer = new Serializer([$normalizer, new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer()]);
            $serializer->denormalize($responseData, "Psi\AppBundle\Entity\Summoner", 'json', ['object_to_populate' => $summoner]);
            $em->persist($summoner);
            $em->flush();
        }

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }
}
