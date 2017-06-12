<?php
// Nemanja Djokic - 496/2013
namespace Psi\AppBundle\Manager;

use Psi\ApiBundle\Response\AbstractResponse;

class ResponseNotManagedException extends \Exception
{

    private $response;

    public function __construct(AbstractResponse $response, $code = null, \Throwable $previous = null)
    {
        $this->response = $response;
        parent::__construct("Response manager asked to process a response that isn't being managed: " . $this->getResponseClass(), $code, $previous);
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getResponseClass()
    {
        return get_class($this->response);
    }
}
