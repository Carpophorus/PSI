<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataChampionsResponse;

class StaticDataChampionsRequest extends RestRequest
{
    
    const REQUEST_URL_CHAMPIONS = "{server}/lol/static-data/v3/champions";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_CHAMPIONS)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataChampionsResponse($responseData, $responseInfo);
    }    
    
}
