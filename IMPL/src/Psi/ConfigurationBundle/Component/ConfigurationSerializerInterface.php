<?php
namespace Psi\ConfigurationBundle\Component;

interface ConfigurationSerializerInterface
{
    /**
     * Serializes a configuration value
     * @param mixed $value
     * @return string
     */
    public function serializeValue($value);
    
    /**
     * Returns a deserialized configuration value
     * @param string $value
     * @return mixed $value
     */
    public function deserializeValue($value);
    
}
