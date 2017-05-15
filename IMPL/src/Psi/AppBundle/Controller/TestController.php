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
     * Gets champion mastery.     
     *  
     * @Route("/championmasteries", name="test_championmastery_action")      
     * @Method({"GET", "POST"})          
     */
    public function testChampionMasteriesAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $championName = $request->get('champion_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createChampionMasteryRequest([
            "summonerId" => rawurlencode($summonerName),"championId" => rawurlencode($championName)
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
     * Gets champion mastery.     
     *  
     * @Route("/masteryscore", name="test_championmasteryscore_action")      
     * @Method({"GET", "POST"})          
     */
    public function testMasteryScoreAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createMasteryScoreRequest([
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
     * Gets match.     
     *  
     * @Route("/match", name="test_match_action")      
     * @Method({"GET", "POST"})          
     */
    public function testMatchAction(Request $request)
    {
        $matchID = $request->get('match_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createMatchRequest([
           "matchId" => rawurlencode($matchID)
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
     * Gets matchlist.     
     *  
     * @Route("/matchlist", name="test_matchlist_action")      
     * @Method({"GET", "POST"})          
     */
    public function testMatchListAction(Request $request)
    {
        $accountID = $request->get('account_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createMatchListRequest([
           "accountId" => rawurlencode($accountID)
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
     * Gets recentmatchlist.     
     *  
     * @Route("/recentmatchlist", name="test_recentmatchlist_action")      
     * @Method({"GET", "POST"})          
     */
    public function testRecentMatchListAction(Request $request)
    {
        $accountID = $request->get('account_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createRecentMatchListRequest([
           "accountId" => rawurlencode($accountID)
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
     * Gets matchtimelines.     
     *  
     * @Route("/matchtimelines", name="test_matchtimelines_action")      
     * @Method({"GET", "POST"})          
     */
    public function testMatchTimelinesAction(Request $request)
    {
        $matchID = $request->get('match_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createMatchTimelinesRequest([
           "matchId" => rawurlencode($matchID)
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
     * Gets leagues.     
     *  
     * @Route("/leagues", name="test_leagues_action")      
     * @Method({"GET", "POST"})          
     */
    public function testLeaguesAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createLeaguesRequest([
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
     * Gets league positions.     
     *  
     * @Route("/leaguepositions", name="test_leaguepositions_action")      
     * @Method({"GET", "POST"})          
     */
    public function testLeaguePositionAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createLeaguePositionRequest([
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
     * Gets current game information.     
     *  
     * @Route("/currentgame", name="test_activegamespec_action")      
     * @Method({"GET", "POST"})          
     */
    public function testActiveGameSpecAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createActiveGameSpecRequest([
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
     * Gets featured game information.     
     *  
     * @Route("/featuredgames", name="test_featuredgames_action")      
     * @Method({"GET", "POST"})          
     */
    public function testFeaturedGamesAction(Request $request)
    {
        $summonerName = $request->get('summoner_id');
        $requestFactory = $this->get('n2m.request.factory');

        $apiRequest = $requestFactory->createFeaturedGamesRequest([
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
