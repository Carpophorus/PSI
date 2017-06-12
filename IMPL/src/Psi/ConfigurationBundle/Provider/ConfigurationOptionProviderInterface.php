<?php
namespace Psi\ConfigurationBundle\Provider;

interface ConfigurationOptionProviderInterface
{

    /**
     * Returns options
     * @return array
     */
    public function getOptions();
}
