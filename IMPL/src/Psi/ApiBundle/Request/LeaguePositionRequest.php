<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\LeaguePositionResponse;
/**
 * Description of LeaguePositionRequest
 *
 * @author borca
 */
class LeaguePositionRequest extends RestRequest {
    
    const REQUEST_URL_LEAGUEPOSITION = "{server}/lol/league/v3/positions/by-summoner/{summonerId}";
    
    function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_LEAGUEPOSITION)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new LeaguePositionResponse($responseData, $responseInfo);
    }    
}
