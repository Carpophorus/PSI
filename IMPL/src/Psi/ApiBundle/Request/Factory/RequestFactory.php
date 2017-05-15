<?php
namespace Psi\ApiBundle\Request\Factory;

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

class RequestFactory implements RequestFactoryInterface
{
    
    protected $_authenthication;

    public function __construct(AuthenticationInterface $authenthication)
    {
        $this->_authenthication = $authenthication;
    }

    protected function getAuthenthication()
    {
        return $this->_authenthication;
    }
    
    public function createMatchRequest($params): MatchRequest
    {
        $request = new MatchRequest($this->_authenthication, $params);
        return $request;
    } 
    
    public function createRestRequest($params): RestRequest
    {
        $request = new RestRequest($this->_authenthication, $params);
        return $request;
    }

    public function createMasteryRequest($params): MasteryRequest
    {
        $request = new MasteryRequest($this->_authenthication, $params);
        return $request;
    }

    public function createSummonerRequest($params): SummonerRequest
    {
        $request = new SummonerRequest($this->_authenthication, $params);
        return $request;
    }

    public function createRuneRequest($params): RuneRequest
    {
        $request = new RuneRequest($this->_authenthication, $params);
        return $request;
    }
     public function createChampionMasteryRequest($params): ChampionMasteryRequest
    {
        $request = new ChampionMasteryRequest($this->_authenthication, $params);
        return $request;
    }
    public function createMasteryScoreRequest($params): MasteryScoreRequest
    {
        $request = new MasteryScoreRequest($this->_authenthication, $params);
        return $request;
    }
     public function createMatchListRequest($params): MatchListRequest
    {
        $request = new MatchListRequest($this->_authenthication, $params);
        return $request;
    }
     public function createRecentMatchListRequest($params): RecentMatchListRequest
    {
        $request = new RecentMatchListRequest($this->_authenthication, $params);
        return $request;
    }
    public function createMatchTimelinesRequest($params): MatchTimelinesRequest
    {
        $request = new MatchTimelinesRequest($this->_authenthication, $params);
        return $request;
    }
    public function createLeaguesRequest($params): LeaguesRequest
    {
        $request = new LeaguesRequest($this->_authenthication, $params);
        return $request;
    }
    public function createLeaguePositionRequest($params): LeaguePositionRequest
    {
        $request = new LeaguePositionRequest($this->_authenthication, $params);
        return $request;
    }
    public function createActiveGameSpecRequest($params): ActiveGameSpecRequest
    {
        $request = new ActiveGameSpecRequest($this->_authenthication, $params);
        return $request;
    }
    public function createFeaturedGamesRequest($params): FeaturedGamesRequest
    {
        $request = new FeaturedGamesRequest($this->_authenthication, $params);
        return $request;
    }
}
