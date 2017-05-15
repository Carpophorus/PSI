<?php
namespace Psi\AppBundle\Transformer\Entity;

use Psi\AppBundle\Transformer\TransformerRegistryInterface;
use Psi\AppBundle\Transformer\ArrayEntityTransformerInterface;

abstract class AbstractArrayTransformer implements ArrayEntityTransformerInterface
{

    /**
     *
     * @var TransformerRegistryInterface
     */
    private $transformerRegistry;

    public function __construct(TransformerRegistryInterface $transformerRegistry)
    {
        $this->transformerRegistry = $transformerRegistry;
    }

    public function getTransformerRegistry(): TransformerRegistryInterface
    {
        return $this->transformerRegistry;
    }

    public function convertArrayToEntity($array)
    {
        $entityClass = $this->getEntityClass();
        $entity = new $entityClass;

        foreach ($this->getFieldMapping() as $arrayField => $entityMethod) {
            $entity->__call($entityMethod, $array[$arrayField]);
        }

        $transformerRegistry = $this->getTransformerRegistry();
        foreach ($this->getEntityMappings() as $arrayField => $mappingInfo) {
            $entityClass = $mappingInfo['entityClass'];
            $transformedEntity = $transformerRegistry->getArrayTransformer($entityClass)->convertArrayToEntity($array[$arrayField]);
            $entity->__call($mappingInfo['method'], $transformedEntity);
        }

        return $entity;
    }

    public function supports($entityClass)
    {
        return ($entityClass === $this->getEntityClass());
    }
}
