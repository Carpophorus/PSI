<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataRunesIdResponse;

class StaticDataRunesIdRequest extends RestRequest
{
    
    const REQUEST_URL_RUNES_BY_ID = "{server}/lol/static-data/v3/runes/{id}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_RUNES_BY_ID)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataRunesIdResponse($responseData, $responseInfo);
    }    
    
}
