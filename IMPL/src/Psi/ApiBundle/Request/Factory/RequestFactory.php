<?php
namespace Psi\ApiBundle\Request\Factory;

use Psi\ApiBundle\Request\RestRequest;
use Psi\ApiBundle\Request\RuneRequest;
use Psi\ApiBundle\Request\SummonerRequest;
use Psi\ApiBundle\Request\MasteryRequest;
use Psi\ApiBundle\Request\MatchRequest;
use Psi\ApiBundle\Request\AuthenticationInterface;

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
}
