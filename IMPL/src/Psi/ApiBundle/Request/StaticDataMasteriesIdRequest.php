<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataMasteriesIdResponse;

class StaticDataMasteriesIdRequest extends RestRequest
{
    
    const REQUEST_URL_MASTERIES_BY_ID = "{server}/lol/static-data/v3/masteries/{id}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERIES_BY_ID)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataMasteriesIdResponse($responseData, $responseInfo);
    }    
    
}
