<?php
namespace Psi\UIBundle\Helper;

use Symfony\Component\Templating\Helper\SlotsHelper as BaseHelper;

/**
 * Inheritance supporting view slot helper
 */
class SlotsHelper extends BaseHelper
{

    /**
     * Inheritance mode
     * @var bool
     */
    protected $inheritance;

    /**
     * Non inheritance slots
     * @var array
     */
    protected $blockSlots;

    public function __construct($inheritance)
    {
        $this->inheritance = $inheritance;
        $this->blockSlots = [];
    }

    public function getInheritance()
    {
        return (bool) $this->inheritance;
    }

    /**
     * Stops slot inheritance propagation.s
     */
    public function stopSlotInheritance()
    {
        if (!$this->openSlots) {
            throw new \LogicException('No slot started.');
        }

        $name = end($this->openSlots);
        $this->blockSlots[$name] = true;
    }

    /**
     * Starts a new slot.
     *
     * This method starts an output buffer that will be
     * closed when the stop() method is called.
     *
     * @param string $name The slot name
     *
     * @throws \InvalidArgumentException if a slot with the same name is already started
     */
    public function start($name)
    {
        if (in_array($name, $this->openSlots)) {
            throw new \InvalidArgumentException(sprintf('A slot named "%s" is already started.', $name));
        }

        $this->openSlots[] = $name;
        if (!$this->getInheritance()) {
            $this->slots[$name] = '';
        }

        ob_start();
        ob_implicit_flush(0);
    }

    /**
     * Stops a slot.
     *
     * @throws \LogicException if no slot has been started
     */
    public function stop()
    {
        if (!$this->openSlots) {
            throw new \LogicException('No slot started.');
        }

        $name = array_pop($this->openSlots);
        $output = ob_get_clean();

        if ($this->inheritance && !isset($this->blockSlots[$name])) {
            $this->slots[$name][] = $output;
        } else {
            if(isset($this->slots[$name]) && $this->slots[$name] !== '') {
                return;
            }
            $this->slots[$name] = $output;
        }
    }

    /**
     * Outputs a slot.
     *
     * @param string      $name    The slot name
     * @param bool|string $default The default slot content
     *
     * @return bool true if the slot is defined or if a default content has been provided, false otherwise
     */
    public function output($name, $default = false)
    {
        if (!isset($this->slots[$name])) {
            if (false !== $default) {
                echo $default;

                return true;
            }

            return false;
        }

        if (!is_array($this->slots[$name])) {
            echo $this->slots[$name];
        } else {
            $slots = $this->slots[$name];
            while ($slot = array_pop($slots)) {
                echo $slot;
            }
        }

        return true;
    }
}
