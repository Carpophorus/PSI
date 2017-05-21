<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\PlayerStatsSummaryResponse;

class PlayerStatsSummaryRequest extends RestRequest
{
    
    const REQUEST_URL_PLAYER_STATS = "{server}/api/lol/eune/v1.3/stats/by-summoner/{summonerId}/summary";

    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_PLAYER_STATS)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new PlayerStatsSummaryResponse($responseData, $responseInfo);
    }    
    
}
