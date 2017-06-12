<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Provider\ConfigurationOptionProviderInterface;

interface ConfigurationFactoryInterface
{

    /**
     * Returns a new ConfigurationInterface
     * @param mixed $data
     * @param string $type
     * @return ConfigurationInterface
     */
    public function createFromArray($data);

    /**
     * Returns a new ConfigurationInterface from passed entity
     * @param Configuration $entity
     * @param string $group
     * @param string $label
     * @param string $type
     * @param string viewTemplate
     * @param string defaultValue
     * @param ConfigurationOptionProviderInterface provider
     * @return ConfigurationInterface
     */
    public function createFromEntity($entity, $group, $label, $type, $viewTemplate, $defaultValue, ConfigurationOptionProviderInterface $provider = null);
}
