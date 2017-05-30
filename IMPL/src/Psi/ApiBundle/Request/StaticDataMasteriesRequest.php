<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataMasteriesResponse;

class StaticDataMasteriesRequest extends RestRequest
{

    const REQUEST_URL_MASTERIES = "{server}/lol/static-data/v3/masteries";

    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_MASTERIES)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataMasteriesResponse($responseData, $responseInfo);
    }

    public function getQueryParams()
    {
        return [
            'masteryListData' => 'image'
        ];
    }
}
