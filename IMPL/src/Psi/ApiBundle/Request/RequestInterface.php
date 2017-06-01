<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Response\ResponseInterface;

interface RequestInterface
{

    /**
     * Returns request default parameters
     * @return array $params
     */
    public function getDefaultParams();

    /**
     * Sets request parameters
     * @param array $params
     */
    public function setParams($params);

    /**
     * Returns request parameters
     * @return array
     */
    public function getParams();

    /**
     * Sends the request
     */
    public function sendRequest();

    /**
     * Returns a ResponseInterface object
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * Returns parameters to append to the query
     * @return array
     */
    public function getQueryParams();
}
