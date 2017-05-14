<?php

namespace Psi\ConfigurationBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class ConfigurationPass implements CompilerPassInterface
{

    const MANAGER_ID = 'psi.manager.configuration.registry';
    const CONFIGURATION_TAG_NAME = 'psi.configuration';

    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $manager = $container->getDefinition(self::MANAGER_ID);

        $this->processConfigurations($manager, $container);
    }

    /**
     * Pass configurations to a manager
     *
     * @param Definition       $managerDefinition
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    protected function processConfigurations(Definition $managerDefinition, ContainerBuilder $container)
    {
        $navigations = $container->findTaggedServiceIds(self::CONFIGURATION_TAG_NAME);

        foreach ($navigations as $serviceId => $tags) {
            $ref = new Reference($serviceId);
            $managerDefinition->addMethodCall('addConfiguration', [$ref]);
        }
    }
       
}
