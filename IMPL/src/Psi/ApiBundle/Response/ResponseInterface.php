<?php
namespace Psi\ApiBundle\Response;

interface ResponseInterface
{

    const RESPONSE_STATUS_ERROR = 500;
    const RESPONSE_STATUS_NOT_FOUND = 404;
    const RESPONSE_STATUS_OK = 200;

    /**
     * Returns the status of the response
     * @return integer
     */
    public function getStatus();

    /**
     * Returns an array of data returned by request
     * @return array
     */
    public function getData();
    
    /**
     * Returns string representation of header
     * @return string
     */
    public function getHeader();
    
    
    /**
     * @param string $header
     */
    public function setHeader($header);    
    
}
