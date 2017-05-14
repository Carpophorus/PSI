<?php
namespace Psi\UserBundle\Model;

class StatusRegistry
{

    private $statuses;

    public function __construct()
    {
        $this->statuses = array();
    }

    public function addStatus($code, $label)
    {
        if (isset($this->statuses[$code])) {
            throw new \Exception("Status with this $code allready exists.");
        }
        $this->statuses[$code] = ['label' => $label, 'code' => $code];
    }

    public function getStatusByCode($code)
    {
        if (!isset($this->statuses[$code])) {
            return null;
        }
        return $this->statuses[$code];
    }

    public function getStatusByLabel($label)
    {
        foreach ($this->statuses as $status) {
            if ($status['label'] = $label) {
                return $status;
            }
        }
        return null;
    }

    public function getStatuses()
    {
        return $this->statuses;
    }
}
