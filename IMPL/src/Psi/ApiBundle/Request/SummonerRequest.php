<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\SummonerResponse;

class SummonerRequest extends RestRequest
{
    
    const REQUEST_URL_SUMMONER_BY_NAME = "{server}/lol/summoner/v3/summoners/by-name/{summonerName}";
    const REQUEST_URL_SUMMONER_BY_IDS = "{server}/lol/summoner/v3/summoners/{summonerId}";
    const REQUEST_URL_SUMMONER_BY_ACCOUNT = "{server}/lol/summoner/v3/summoners/by-account/{accountId}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_SUMMONER_BY_NAME)
    {
        parent::__construct($authenthication, $params, $url);
    }  
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new SummonerResponse($responseData, $responseInfo);
    }     
    
}
