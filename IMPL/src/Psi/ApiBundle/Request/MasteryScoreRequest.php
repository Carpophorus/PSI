<?php


namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MasteryScoreResponse;

class MasteryScoreRequest extends RestRequest
{
    const REQUEST_URL_MASTERY_SCORE = "{server}/lol/champion-mastery/v3/scores/by-summoner/{summonerId}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERY_SCORE)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MasteryScoreResponse($responseData, $responseInfo);
    }
}
