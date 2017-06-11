<?php
// Marko Mrkonjic - 3139/2016
namespace Psi\AppBundle\Manager;

use Psi\AppBundle\Manager\ResponseNotManagedException;
use Psi\AppBundle\Serializer\Denormalizer\ApiResponseDenormalizerInterface;

class ApiResponseManager implements ApiResponseManagerInterface
{

    /**
     * Registered response denormalizers
     * @var ApiResponseDenormalizer[] 
     */
    private $handlers;

    public function addResponseHandler(ApiResponseDenormalizerInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    public function processResponse(\Psi\ApiBundle\Response\AbstractResponse $response)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supportsResponse($response)) {
                return $handler->denormalizeResponse($response);
            }
        }

        throw new ResponseNotManagedException($response);
    }
}
