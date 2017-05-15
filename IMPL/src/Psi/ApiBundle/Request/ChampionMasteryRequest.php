<?php

namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\ChampionMasteryResponse;

class ChampionMasteryRequest extends RestRequest
{
   
    const REQUEST_URL_MASTERIES_BY_SUMMONER_ID = "{server}/lol/champion-mastery/v3/champion-masteries/by-summoner/{summonerId}/by-champion/{championId}";
   

   
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERIES_BY_SUMMONER_ID)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new ChampionMasteryResponse($responseData, $responseInfo);
    }
}