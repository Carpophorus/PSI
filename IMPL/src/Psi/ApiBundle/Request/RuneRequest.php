<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\RuneResponse;

class RuneRequest extends RestRequest
{
    const REQUEST_URL_RUNES = "{server}/lol/platform/v3/runes/by-summoner/{summonerId}";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_RUNES)
    {
        parent::__construct($authenthication, $params, $url);
    }  
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new RuneResponse($responseData, $responseInfo);
    }      
    
}
