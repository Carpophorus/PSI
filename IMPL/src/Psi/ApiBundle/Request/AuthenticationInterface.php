<?php
namespace Psi\ApiBundle\Request;


interface AuthenticationInterface
{
    
    /**
     * Returns needed API key in string format
     * @return string
     */
    public function getApiKey();
    
}
