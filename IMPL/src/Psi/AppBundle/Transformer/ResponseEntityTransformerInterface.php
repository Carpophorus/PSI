<?php
namespace Psi\AppBundle\Transformer;

use Psi\ApiBundle\Response\ResponseInterface;
use Psi\AppBundle\Transformer\ResponseNotSupportedException;
use Psi\AppBundle\Transformer\TransformerRegistryInterface;

interface ResponseEntityTransformerInterface
{

    /**
     * 
     * @param ResponseInterface $response
     * @return $entity
     */
    public function convertResponseToEntity(ResponseInterface $response);

    /**
     * Returns a indicator whether a 
     * @param ResponseInterface $response
     * @throws ResponseNotSupportedException
     */
    public function supports(ResponseInterface $response);

    /**
     * Returns entity mappings inside the response
     * For every entity mapping a supporting transformer is looked for during the transforming.
     * @return array
     */
    public function getEntityMappings();

    /**
     * Returns response to entity field mappings inside the response
     * @return array
     */
    public function getFieldMapping();

    /**
     * Returns doctrine entity name
     * @return string
     */
    public function getEntityClass();

    /**
     * Returns a Transformer registry
     * @return TransformerRegistryInterface
     */
    public function getTransformerRegistry();
}
