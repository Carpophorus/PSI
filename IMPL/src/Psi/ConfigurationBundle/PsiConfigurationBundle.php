<?php
namespace Psi\ConfigurationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Psi\ConfigurationBundle\DependencyInjection\CompilerPass\ConfigurationPass;

class PsiConfigurationBundle extends Bundle
{

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ConfigurationPass());
    }
}
