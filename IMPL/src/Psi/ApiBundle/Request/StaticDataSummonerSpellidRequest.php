<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataSummonerSpellidResponse;

class StaticDataSummonerSpellidRequest extends RestRequest
{
    
    const REQUEST_URL_SUMMONER_SPELL_BY_ID = "{server}/lol/static-data/v3/summoner-spells/{id}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_SUMMONER_SPELL_BY_ID)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataSummonerSpellidResponse($responseData, $responseInfo);
    }    
    
}
