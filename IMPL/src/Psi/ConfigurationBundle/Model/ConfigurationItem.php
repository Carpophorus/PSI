<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Model\ConfigurationItemInterface;
use Psi\ConfigurationBundle\Provider\ConfigurationOptionProviderInterface;

class ConfigurationItem implements ConfigurationItemInterface
{

    /**
     * 
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $viewTemplate
     * @param string $value
     */
    public function __construct(
    $name, $group, $label, $type, $viewTemplate = null, $value = null, ConfigurationOptionProviderInterface $options = null
    )
    {
        $this->data = [];
        $this->data['name'] = $name;
        $this->data['group'] = $group;
        $this->data['label'] = $label;
        $this->data['type'] = $type;
        $this->data['viewTemplate'] = $viewTemplate;
        $this->data['value'] = $value;
        $this->data['options'] = $options;
    }

    public function getConfigurationData(): array
    {
        return $this->data;
    }
}
