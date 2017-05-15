<?php
namespace Psi\AppBundle\Transformer;

use Psi\AppBundle\Transformer\TransformerRegistryInterface;

interface ArrayEntityTransformerInterface
{

    /**
     * Attempts to convert an array of data to a entity
     * @param $array
     * @return $entity
     * @throw \Exception
     */
    public function convertArrayToEntity($array);

    /**
     * Returns entity mappings inside the response
     * For every entity mapping a supporting array transformer is looked for during the transforming.
     * @return array
     */
    public function getEntityMappings();

    /**
     * Returns array to entity field mappings inside the response
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
