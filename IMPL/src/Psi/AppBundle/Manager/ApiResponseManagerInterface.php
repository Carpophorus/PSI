<?php
namespace Psi\AppBundle\Manager;

use Psi\ApiBundle\Response\AbstractResponse;
use Psi\AppBundle\Manager\ResponseNotManagedException;
use Psi\AppBundle\Serializer\Denormalizer\ApiResponseDenormalizerInterface;

interface ApiResponseManagerInterface
{

    /**
     * Processes an response, returning a system entity if possible
     * @param AbstractResponse $response
     * @throws ResponseNotManagedException
     */
    public function processResponse(AbstractResponse $response);

    /**
     * Adds a new response handler to the manager
     * @param ApiResponseDenormalizer $handler
     */
    public function addResponseHandler(ApiResponseDenormalizerInterface $handler);
    
    
    
    
}
