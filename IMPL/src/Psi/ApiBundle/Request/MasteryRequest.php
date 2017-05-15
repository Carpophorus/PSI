<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MasteryResponse;

class MasteryRequest extends RestRequest
{

    const REQUEST_URL_MASTERIES = "{server}/lol/champion-mastery/v3/champion-masteries/by-summoner/{summonerId}";

    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERIES)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MasteryResponse($responseData, $responseInfo);
    }
}
