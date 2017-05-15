<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\FeaturedGamesResponse;

class FeaturedGamesRequest extends RestRequest {
   
    const REQUEST_URL_FEATUREDGAME = "{server}/lol/spectator/v3/featured-games";
    
    function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_FEATUREDGAME)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new FeaturedGamesResponse($responseData, $responseInfo);
    }    
}
