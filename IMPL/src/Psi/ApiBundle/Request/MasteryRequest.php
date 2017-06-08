<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\MasteryResponse;

class MasteryRequest extends RestRequest
{

    const REQUEST_URL_MASTERIES = "{server}/lol/platform/v3/masteries/by-summoner/{summonerId}";

    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERIES)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new MasteryResponse($responseData, $responseInfo);
    }
}
