<?php
namespace Psi\ConfigurationBundle\Model;


interface ConfigurationFactoryInterface
{
    
    /**
     * Returns a new ConfigurationInterface
     * @param mixed $data
     * @param string $type
     * @return ConfigurationInterface
     */
    public function createFromArray($data, $type);
    
    /**
     * Returns a new ConfigurationInterface from passed entity
     * @param Configuration $entity
     * @param string $type
     * @param string viewTemplate
     * @return ConfigurationInterface
     */
    public function createFromEntity($entity, $type, $viewTemplate);
    
}
