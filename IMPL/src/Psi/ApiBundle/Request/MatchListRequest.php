<?php

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MatchListResponse;

class MatchListRequest extends RestRequest{
  
    const REQUEST_URL_MATCHLIST = "{server}/lol/match/v3/matchlists/by-account/{accountId}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MATCHLIST)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MatchListResponse($responseData, $responseInfo);
    }    
    
}
