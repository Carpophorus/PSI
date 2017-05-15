<?php


namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MatchTimelinesResponce;

class MatchTimelinesRequest extends RestRequest {
   
    const REQUEST_URL_TIMELINES = "{server}/lol/match/v3/timelines/by-match/{matchId}";
    
      function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_TIMELINES)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MatchTimelinesResponce($responseData, $responseInfo);
    }    
}
