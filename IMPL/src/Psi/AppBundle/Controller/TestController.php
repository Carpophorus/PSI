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
    /**
     * Gets ranked stats.     
     *  
     * @Route("/rankedstats", name="test_rankedstats_action")      
     * @Method({"GET", "POST"})          
     */
    public function testRankedStatsAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $summonerRegion = "EUNE";
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createRankedStatsRequest([
           "region" => rawurldecode($summonerRegion), "summonerId" => rawurlencode($summonerName)
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
     * Gets player stats summary.     
     *  
     * @Route("/playerstatssummary", name="test_playerstatssummary_action")      
     * @Method({"GET", "POST"})          
     */
    public function testPlayerStatsSummaryAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createPlayerStatsSummaryRequest([
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
     * Gets all champions.     
     *  
     * @Route("/staticdatachampions", name="test_staticdatachampions_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataChampionsAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataChampionsRequest([
           //"region" => rawurldecode($summonerRegion), "summonerId" => rawurlencode($summonerName)
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
     * Gets  champion by id.     
     *  
     * @Route("/staticdatachampionid", name="test_staticdatachampionid_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataChampionIdAction(Request $request)
    {
        $championId = $request->get('champion_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataChampionIdRequest([
            "id" => rawurlencode($championId)
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
     * Gets all masteries.     
     *  
     * @Route("/staticdatamasteries", name="test_staticdatamasteries_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataMasteriesAction(Request $request)
    {
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataMasteriesRequest([
            
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
     * Gets masteries by id.     
     *  
     * @Route("/staticdatamasteriesid", name="test_staticdatamasteriesid_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataMasteriesIdAction(Request $request)
    {
        $masteriesId = $request->get('masteries_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataMasteriesIdRequest([
            "id" => rawurlencode($masteriesId)
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
     * Gets all profile icons.     
     *  
     * @Route("/staticdataprofileicons", name="test_staticdataprofileicons_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataProfileIconsAction(Request $request)
    {
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataProfileIconsRequest([
            
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
     * Gets all runes.     
     *  
     * @Route("/staticdatarunes", name="test_staticdatarunes_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataRunesAction(Request $request)
    {
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataRunesRequest([
            
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
     * Gets all profile icons.     
     *  
     * @Route("/staticdatarunesid", name="test_staticdatarunesid_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataRunesIdAction(Request $request)
    {
        $runesId = $request->get('runes_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataRunesIdRequest([
            "id" => rawurlencode($runesId)
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
     * Gets all summoner spells.     
     *  
     * @Route("/staticdatasummonerspells", name="test_staticdatasummonerspells_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataSummonerSpellsAction(Request $request)
    {
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataSummonerSpellsRequest([
            
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
     * Gets all profile icons.     
     *  
     * @Route("/staticdatasummonerspellid", name="test_staticdatasummonerspellid_action")      
     * @Method({"GET", "POST"})          
     */
    public function testStaticDataSummonerSpellidAction(Request $request)
    {
        $summonerspellId = $request->get('summonerspell_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createStaticDataSummonerSpellidRequest([
            "id" => rawurlencode($summonerspellId)
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
