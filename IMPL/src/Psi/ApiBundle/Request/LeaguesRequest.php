<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\LeaguesResponse;
/**
 * Description of LeaguesRequest
 *
 * @author borca
 */
class LeaguesRequest extends RestRequest{
    
     const REQUEST_URL_LEAGUE = "{server}/lol/league/v3/leagues/by-summoner/{summonerId}";
    
      function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_LEAGUE)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new LeaguesResponse($responseData, $responseInfo);
    }    
}
