<?php
namespace Psi\ConfigurationBundle\Model;

interface ConfigurationInterface
{

    /**
     * Returns configuration value
     * @return mixed
     */
    public function getValue();

    /**
     * Sets configuration value
     * @param mixed $value
     */
    public function setValue($value);

    /**
     * Returns configuration label
     * @param 
     */
    public function getLabel();

    /**
     * Returns configuration group name
     * @return string
     */
    public function getGroup();

    /**
     * @todo
     * getDefaultValue()
     * getViewTemplate()
     */

    /**
     * Returns default configuration value if value isn't set
     * @return mixed
     */
    public function getDefaultValue();

    /**
     * Returns configuration view template used for rendering
     * @return string
     */
    public function getViewTemplate();
    
    /**
     * Saves the system configuration
     */
    public function save();
}
