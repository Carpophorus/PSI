<?php
namespace Psi\ApiBundle\Response;

abstract class AbstractResponse implements ResponseInterface
{
    
    /**
     * Response data
     * @var array 
     */
    protected $_data;
    
    /**
     * Response status
     * @var integer 
     */
    protected $_status;
    
    /**
     * Response header
     * @var string
     */
    protected $_header;
    
    public function getData(): array
    {
        return $this->_data;
    }

    public function getStatus(): integer
    {
        return $this->_status;
    }
    
    public function getHeader() : string
    {
        return $this->_header;
    }
}
