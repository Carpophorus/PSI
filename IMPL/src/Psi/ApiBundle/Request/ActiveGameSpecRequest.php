<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\ActiveGameSpecResponse;
/**
 * Description of ActiveGameSpecRequest
 *
 * @author borca
 */
class ActiveGameSpecRequest extends RestRequest{
    
    
    const REQUEST_URL_ACTIVEGAME = "{server}/lol/spectator/v3/active-games/by-summoner/{summonerId}";
    
    function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_ACTIVEGAME)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new ActiveGameSpecResponse($responseData, $responseInfo);
    }    
}
