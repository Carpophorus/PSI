<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\RankedStatsResponse;

class RankedStatsRequest extends RestRequest
{
    
    const REQUEST_URL_RANKED_STATS = "{server}/api/lol/{region}/v1.3/stats/by-summoner/{summonerId}/ranked";

    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_RANKED_STATS)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new RankedStatsResponse($responseData, $responseInfo);
    }    
    
}
