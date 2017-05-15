<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MatchResponse;

class MatchRequest extends RestRequest
{
    
    const REQUEST_URL_MATCH_BY_TOURNAMENT = "{server}/api/lol/{region}/v2.2/match/by-tournament/{tournamentCode}/ids";
    const REQUEST_URL_MATCH_FOR_TOURNAMENT = "{server}/api/lol/{region}/v2.2/match/for-tournament/{matchId}";
    const REQUEST_URL_MATCH = "{server}/lol/match/v3/matches/{matchId}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MATCH)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MatchResponse($responseData, $responseInfo);
    }    
    
}
