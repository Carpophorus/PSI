<?php
namespace Psi\ApiBundle\Response;

class RestResponse extends AbstractResponse
{
    
    public function __construct($responseData, $responseInfo)
    {
        $this->_data = (array) $responseData;
        $this->_status = $responseInfo;
    }
    
    public function setHeader($header) {
        $this->_header = $header;
    }
    
    
}
