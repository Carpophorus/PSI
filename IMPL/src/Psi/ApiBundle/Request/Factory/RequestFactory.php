<?php
// Nemanja Djokic - 496/2013
// Viktor Galindo - 655/2013
namespace Psi\ApiBundle\Request\Factory;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Psi\ApiBundle\Event\ApiRequestCreateEvent;
use Psi\ApiBundle\Request\RestRequest;
use Psi\ApiBundle\Request\RuneRequest;
use Psi\ApiBundle\Request\SummonerRequest;
use Psi\ApiBundle\Request\MasteryRequest;
use Psi\ApiBundle\Request\MatchRequest;
use Psi\ApiBundle\Request\AuthenticationInterface;
use Psi\ApiBundle\Request\ChampionMasteryRequest;
use Psi\ApiBundle\Request\MasteryScoreRequest;
use Psi\ApiBundle\Request\MatchListRequest;
use Psi\ApiBundle\Request\RecentMatchListRequest;
use Psi\ApiBundle\Request\MatchTimelinesRequest;
use Psi\ApiBundle\Request\LeaguesRequest;
use Psi\ApiBundle\Request\LeaguePositionRequest;
use Psi\ApiBundle\Request\ActiveGameSpecRequest;
use Psi\ApiBundle\Request\FeaturedGamesRequest;
use Psi\ApiBundle\Request\RankedStatsRequest;
use Psi\ApiBundle\Request\PlayerStatsSummaryRequest;
use Psi\ApiBundle\Request\StaticDataChampionsRequest;
use Psi\ApiBundle\Request\StaticDataChampionIdRequest;
use Psi\ApiBundle\Request\StaticDataMasteriesRequest;
use Psi\ApiBundle\Request\StaticDataMasteriesIdRequest;
use Psi\ApiBundle\Request\StaticDataProfileIconsRequest;
use Psi\ApiBundle\Request\StaticDataRunesRequest;
use Psi\ApiBundle\Request\StaticDataRunesIdRequest;
use Psi\ApiBundle\Request\StaticDataSummonerSpellsRequest;
use Psi\ApiBundle\Request\StaticDataSummonerSpellidRequest;

class RequestFactory implements RequestFactoryInterface
{

    /**
     *
     * @var AuthenthicationInterface
     */
    protected $_authenthication;

    /**
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(AuthenticationInterface $authenthication, EventDispatcherInterface $dispatcher)
    {
        $this->_authenthication = $authenthication;
        $this->dispatcher = $dispatcher;
    }

    protected function getAuthenthication()
    {
        return $this->_authenthication;
    }

    public function createMatchRequest($params): MatchRequest
    {
        $request = new MatchRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createRestRequest($params): RestRequest
    {
        $request = new RestRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createMasteryRequest($params): MasteryRequest
    {
        $request = new MasteryRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createSummonerRequest($params): SummonerRequest
    {
        $request = new SummonerRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createRuneRequest($params): RuneRequest
    {
        $request = new RuneRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createRankedStatsRequest($params): RankedStatsRequest
    {
        $request = new RankedStatsRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createPlayerStatsSummaryRequest($params): PlayerStatsSummaryRequest
    {
        $request = new PlayerStatsSummaryRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataChampionsRequest($params): StaticDataChampionsRequest
    {
        $request = new StaticDataChampionsRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataChampionIdRequest($params): StaticDataChampionIdRequest
    {
        $request = new StaticDataChampionIdRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataMasteriesRequest($params): StaticDataMasteriesRequest
    {
        $request = new StaticDataMasteriesRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataMasteriesIdRequest($params): StaticDataMasteriesIdRequest
    {
        $request = new StaticDataMasteriesIdRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataProfileIconsRequest($params): StaticDataProfileIconsRequest
    {
        $request = new StaticDataProfileIconsRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataRunesRequest($params): StaticDataRunesRequest
    {
        $request = new StaticDataRunesRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataRunesIdRequest($params): StaticDataRunesIdRequest
    {
        $request = new StaticDataRunesIdRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataSummonerSpellsRequest($params): StaticDataSummonerSpellsRequest
    {
        $request = new StaticDataSummonerSpellsRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createStaticDataSummonerSpellidRequest($params): StaticDataSummonerSpellidRequest
    {
        $request = new StaticDataSummonerSpellidRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createChampionMasteryRequest($params): ChampionMasteryRequest
    {
        $request = new ChampionMasteryRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createMasteryScoreRequest($params): MasteryScoreRequest
    {
        $request = new MasteryScoreRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createMatchListRequest($params): MatchListRequest
    {
        $request = new MatchListRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createRecentMatchListRequest($params): RecentMatchListRequest
    {
        $request = new RecentMatchListRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createMatchTimelinesRequest($params): MatchTimelinesRequest
    {
        $request = new MatchTimelinesRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createLeaguesRequest($params): LeaguesRequest
    {
        $request = new LeaguesRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createLeaguePositionRequest($params): LeaguePositionRequest
    {
        $request = new LeaguePositionRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createActiveGameSpecRequest($params): ActiveGameSpecRequest
    {
        $request = new ActiveGameSpecRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }

    public function createFeaturedGamesRequest($params): FeaturedGamesRequest
    {
        $request = new FeaturedGamesRequest($this->_authenthication, $params);
        $this->dispatcher->dispatch(ApiRequestCreateEvent::NAME, new ApiRequestCreateEvent($request));
        return $request;
    }
}
