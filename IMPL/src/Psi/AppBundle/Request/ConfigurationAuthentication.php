<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Request;

use Psi\ApiBundle\Request\AuthenticationInterface;
use Psi\ConfigurationBundle\Manager\ConfigurationRegistry;

class ConfigurationAuthentication implements AuthenticationInterface
{

    /**
     *
     * @var ConfigurationRegistry
     */
    private $configurationRegistry;

    public function __construct(ConfigurationRegistry $configurationRegistry)
    {
        $this->configurationRegistry = $configurationRegistry;
    }

    public function getApiKey(): string
    {
        return $this->configurationRegistry->getConfiguration('psi.app.api.key')->getValue();
    }
}
