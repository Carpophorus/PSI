<?php

namespace Psi\ApiBundle\Request\Factory;

interface RequestFactoryInterface
{
    
    /**
     * Creates a new request from supplied parameters
     * @param array $params
     * @return RequestInterface
     */
    public function createRestRequest($params);
    
}
