<?php
namespace Psi\ConfigurationBundle\Component;

interface ConfigurationEncrypterInterface
{
    
    /**
     * Encrypts a configuration value
     * @param mixed $value
     * @return string
     */
    public function encryptValue($value);
    
    /**
     * Decrypts a configuration value
     * @param string $value
     * @return mixed
     */
    public function decryptValue($value);
    
}
