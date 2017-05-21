<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataRunesResponse;

class StaticDataRunesRequest extends RestRequest
{
    
    const REQUEST_URL_RUNES = "{server}/lol/static-data/v3/runes";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_RUNES)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataRunesResponse($responseData, $responseInfo);
    }    
    
}
