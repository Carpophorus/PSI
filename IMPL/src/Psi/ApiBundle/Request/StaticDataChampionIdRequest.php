<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataChampionIdResponse;

class StaticDataChampionIdRequest extends RestRequest
{
    
    const REQUEST_URL_CHAMPION_BY_ID = "{server}/lol/static-data/v3/champions/{id}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_CHAMPION_BY_ID)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataChampionIdResponse($responseData, $responseInfo);
    }    
    
}
