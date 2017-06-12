<?php
namespace Psi\ConfigurationBundle\Model;

interface ConfigurationItemInterface
{

    /**
     * Returns configuration data
     * @return array
     */
    public function getConfigurationData();
}
