<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Model\ConfigurationItemInterface;

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
    $name, $group, $label, $type, $viewTemplate = null, $value = null
    )
    {
        $this->data = [];
        $this->data['name'] = $name;
        $this->data['group'] = $group;
        $this->data['label'] = $label;
        $this->data['type'] = $type;
        $this->data['viewTemplate'] = $viewTemplate;
        $this->data['value'] = $value;
    }

    public function getConfigurationData(): array
    {
        return $this->data;
    }
}
