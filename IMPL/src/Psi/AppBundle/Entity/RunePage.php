<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RunePage
 *
 * @ORM\Entity()
 * @ORM\Table(name="summoner_runepage")
 */
class RunePage
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @ORM\Column(name="external_id", type="bigint")  
     */
    protected $externalId;
    
    /**
     *
     * @var string 
     * @ORM\Column(name="name", type="string") 
     */
    protected $name;
    
    /**
     * @var Rune[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="Psi\AppBundle\Entity\Rune", mappedBy="runepage",cascade={"all"})
     */    
    protected $runes;
    
    /**
     *
     * @var \DateTime
     * @ORM\Column(name="imported_at", type="datetime")
     */
    protected $importedAt;
    
    /**
     *
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->runes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return RunePage
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return RunePage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return RunePage
     */
    public function setImportedAt($importedAt)
    {
        $this->importedAt = $importedAt;

        return $this;
    }

    /**
     * Get importedAt
     *
     * @return \DateTime
     */
    public function getImportedAt()
    {
        return $this->importedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return RunePage
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add rune
     *
     * @param \Psi\AppBundle\Entity\Rune $rune
     *
     * @return RunePage
     */
    public function addRune(\Psi\AppBundle\Entity\Rune $rune)
    {
        $this->runes[] = $rune;

        return $this;
    }

    /**
     * Remove rune
     *
     * @param \Psi\AppBundle\Entity\Rune $rune
     */
    public function removeRune(\Psi\AppBundle\Entity\Rune $rune)
    {
        $this->runes->removeElement($rune);
    }

    /**
     * Get runes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRunes()
    {
        return $this->runes;
    }
}
