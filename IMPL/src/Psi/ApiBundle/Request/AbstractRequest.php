<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\ResponseInterface;

abstract class AbstractRequest implements RequestInterface
{

    /**
     * Request parameters
     * @var array 
     */
    protected $_params = [];

    /**
     * Returned response
     * @var ResponseInterface 
     */
    protected $_response;

    /**
     * Default parameters
     * @var array 
     */
    protected $_defaultParams = ['region' => 'eun1', 'server' => 'https://eun1.api.riotgames.com'];

    public function getDefaultParams(): array
    {
        return $this->_defaultParams;
    }

    public function getParams(): array
    {
        return array_merge($this->_defaultParams, $this->_params);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->_response;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function getQueryParams()
    {
        return [];
    }
}
