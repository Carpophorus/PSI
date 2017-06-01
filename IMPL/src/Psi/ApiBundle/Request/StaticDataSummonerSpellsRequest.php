<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\StaticDataSummonerSpellsResponse;

class StaticDataSummonerSpellsRequest extends RestRequest
{

    const REQUEST_URL_SUMMONER_SPELLS = "{server}/lol/static-data/v3/summoner-spells";

    public function __construct(AuthenticationInterface $authenthication, $params, $url = self::REQUEST_URL_SUMMONER_SPELLS)
    {
        parent::__construct($authenthication, $params, $url);
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new StaticDataSummonerSpellsResponse($responseData, $responseInfo);
    }

    public function getQueryParams()
    {
        return [
            'spellListData' => 'image'
        ];
    }
}
