<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataProfileIconsResponse;

class StaticDataProfileIconsRequest extends RestRequest
{
    
    const REQUEST_URL_PROFILE_ICONS = "{server}/lol/static-data/v3/profile-icons";
    
    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_PROFILE_ICONS)
    {
        parent::__construct($authenthication, $params, $url);
    }    
    
    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataProfileIconsResponse($responseData, $responseInfo);
    }    
    
}
