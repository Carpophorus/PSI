<?php
namespace Psi\ConfigurationBundle\Manager;

use Psi\ConfigurationBundle\Model\ConfigurationInterface;
use Psi\ConfigurationBundle\Model\ConfigurationFactoryInterface;
use Psi\ConfigurationBundle\Model\ConfigurationItemInterface;

class ConfigurationRegistry
{

    /**
     * Loaded configurations
     * @var ConfigurationInterface[] 
     */
    private $configurations;

    /**
     * Configurations grouped by their group name
     * @var array
     */
    private $configurationGroups;

    /**
     * Factory for creating new configurations
     * @var ConfigurationFactoryInterface 
     */
    private $configurationFactory;

    public function __construct(ConfigurationFactoryInterface $configurationFactory)
    {
        $this->configurationFactory = $configurationFactory;
        $this->configurations = [];
        $this->configurationGroups = [];
    }

    /**
     * Validates configuration array
     * @param array $data
     * @return bool
     */
    protected function validateConfiguration($data)
    {
        return isset($data['name'], $data['label'], $data['type'], $data['viewTemplate']);
    }

    /**
     * Adds configuration to the registry.
     * @param ConfigurationItemInterface $item
     * @throws \Exception
     */
    public function addConfiguration(ConfigurationItemInterface $item)
    {
        $data = $item->getConfigurationData();
        if (!$this->validateConfiguration($data)) {
            throw new \Exception("Configuration not valid. Please check your YAML configuration file.");
        }
        $configuration = $this->configurationFactory->createFromArray($data);
        $this->configurations[$data['name']] = $configuration;
        $this->configurationGroups[$data['group']][$data['name']] = $configuration;
    }

    /**
     * Returns a existing ConfigurationInterface or null
     * @param string $name
     * @return ConfigurationInterface
     */
    public function getConfiguration($name)
    {
        if (isset($this->configurations[$name])) {
            return $this->configurations[$name];
        }
        return null;
    }

    /**
     * Returns all registered configurations
     * @return ConfigurationInterface[]
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

    /**
     * Returns configurations grouped by group name
     * @return array
     */
    public function getConfigurationGroups()
    {
        return $this->configurationGroups;
    }
}
