<?php
namespace Psi\AppBundle\Transformer;

use Psi\AppBundle\Transformer\TransformerRegistryInterface;
use Psi\AppBundle\Transformer\ResponseEntityTransformerInterface;
use Psi\AppBundle\Transformer\ArrayEntityTransformerInterface;
use Psi\ApiBundle\Response\ResponseInterface;

class TransformerRegistry implements TransformerRegistryInterface
{

    /**
     * Transformers inside the registry
     * @var ResponseEntityTransformerInterface[]
     */
    private $_transformers;

    public function __construct()
    {
        $this->_transformers = [];
    }

    public function addResponseTransformer(ResponseEntityTransformerInterface $transformer)
    {
        $this->_transformers[] = $transformer;
    }

    public function getResponseTransformer(ResponseInterface $response): ResponseEntityTransformerInterface
    {
        foreach ($this->_transformers as $transformer) {
            if ($transformer->supports($response)) {
                return $transformer;
            }
        }

        throw new NoSupportedTransformerExists();
    }

    public function addArrayTransformer(ArrayEntityTransformerInterface $transformer)
    {
        $this->_arrayTransformers[] = $transformer;
    }

    public function getArrayTransformer($entityClass)
    {
        foreach ($this->_arrayTransformers as $transformer) {
            if ($transformer->supports($entityClass)) {
                return $transformer;
            }
        }

        throw new NoSupportedTransformerExists();
    }
}
