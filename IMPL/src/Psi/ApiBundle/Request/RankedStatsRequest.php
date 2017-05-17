<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\RankedStatsResponse;
/**
 * Description of RankedStatsRequest
 *
 * @author borca
 */
class RankedStatsRequest extends RestRequest{
   
    const REQUEST_URL_RANKED_STATS = "{server}/api/lol/{region}/v1.3/stats/by-summoner/{summonerId}/ranked";
    
    function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_RANKED_STATS)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new RankedStatsResponse($responseData, $responseInfo);
    }    
}
