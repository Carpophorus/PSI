<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ExternalIdTrait
{

    /**
     *
     * @var string
     * @ORM\Column(name="external_id", type="bigint", unique=true) 
     */
    protected $external_id;

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return Mastery
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->external_id;
    }
}
