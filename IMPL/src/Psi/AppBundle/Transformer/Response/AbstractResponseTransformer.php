<?php
namespace Psi\AppBundle\Transformer\Response;

use Psi\AppBundle\Transformer\ResponseEntityTransformerInterface;
use Psi\AppBundle\Transformer\TransformerRegistryInterface;
use Psi\ApiBundle\Response\ResponseInterface;

abstract class AbstractResponseTransformer implements ResponseEntityTransformerInterface
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

    public function convertResponseToEntity(ResponseInterface $response)
    {
        $responseData = $response->getData();

        $entityClass = $this->getEntityClass();
        $entity = new $entityClass;

        foreach ($this->getFieldMapping() as $responseField => $entityMethod) {
            $entity->__call($entityMethod, $responseData[$responseField]);
        }

        $transformerRegistry = $this->getTransformerRegistry();
        foreach ($this->getEntityMappings() as $responseField => $mappingInfo) {
            $entityClass = $mappingInfo['entityClass'];
            $transformedEntity = $transformerRegistry->getArrayTransformer($entityClass)->convertArrayToEntity($responseData[$responseField]);
            $entity->__call($mappingInfo['method'], $transformedEntity);
        }

        return $entity;
    }

    public function supports(ResponseInterface $response)
    {
        $class = get_class($response);
        $responseClass = "\Psi\ApiBundle\Response\MatchResponse";
        return ($responseClass === $class || is_subclass_of($class, $responseClass));
    }
}
