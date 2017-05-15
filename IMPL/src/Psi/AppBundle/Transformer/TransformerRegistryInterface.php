<?php
namespace Psi\AppBundle\Transformer;

use Psi\ApiBundle\Response\ResponseInterface;
use Psi\AppBundle\Transformer\ResponseEntityTransformerInterface;
use Psi\AppBundle\Transformer\ArrayEntityTransformerInterface;
use Psi\AppBundle\Transformer\NoSupportedTransformerExists;

interface TransformerRegistryInterface
{

    /**
     * Returns first matching response transformer
     * @param ResponseInterface $response
     * @return ResponseEntityTransformerInterface
     * @throws NoSupportedTransformerExists
     */
    public function getResponseTransformer(ResponseInterface $response);

    /**
     * 
     * @param ResponseEntityTransformerInterface $transformer
     */
    public function addResponseTransformer(ResponseInterface $response, ResponseEntityTransformerInterface $transformer);

    /**
     * Returns an ArrayTransformer associated with entity class
     * @param type $entityClass
     * @return ArrayEntityTransformerInterface
     * @throw NoSupportedTransformerExists
     */
    public function getArrayTransformer($entityClass);

    /**
     * 
     * @param ArrayEntityTransformerInterface $transformer
     */
    public function addArrayTransformer(ArrayEntityTransformerInterface $transformer);
}
