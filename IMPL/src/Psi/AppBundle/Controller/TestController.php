<?php
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/test")
 */
class TestController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render(
                'PsiAppBundle:Test:index.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }
    
    /**
     * @Route("/test")
     */
    public function testAction()
    {
        return $this->render(
                'PsiAppBundle:Test:example.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }
    

    /**
     * Gets summoner runes.     
     *  
     * @Route("/summoner", name="test_summoner_action")      
     * @Method({"GET", "POST"})      
     */
    public function testSummonerActon(Request $request)
    {
        $summonerName = $request->get('summoner_name');

        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createSummonerRequest([
            "summonerName" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }

    /**
     * Gets summoner runes.     
     *  
     * @Route("/runes", name="test_runes_action")      
     * @Method({"GET", "POST"})        
     */
    public function testRunesAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');

        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createRuneRequest([
            "summonerId" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }

    /**
     * Gets summoner runes.     
     *  
     * @Route("/masteries", name="test_masteries_action")      
     * @Method({"GET", "POST"})          
     */
    public function testMasteriesAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');

        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createMasteryRequest([
            "summonerId" => rawurlencode($summonerName)
        ]);


        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();

        return $this->render(
                'PsiAppBundle:Test:dump.html.php', [
                'request' => $apiRequest,
                'response' => $apiResponse
        ]);
    }
}
