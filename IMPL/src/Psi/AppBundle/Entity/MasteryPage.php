<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MasteryPage
 *
 * @ORM\Entity()
 * @ORM\Table(name="summoner_mastery_page")
 */
class MasteryPage
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="external_id", type="bigint")
     */
    protected $externalId;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var Mastery[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="Psi\AppBundle\Entity\Mastery", mappedBy="masteryPage",cascade={"all"})
     */
    protected $masteries;
    
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
        $this->masteries = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return MasteryPage
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
     * @return MasteryPage
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
     * @return MasteryPage
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
     * @return MasteryPage
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
     * Add mastery
     *
     * @param \Psi\AppBundle\Entity\Mastery $mastery
     *
     * @return MasteryPage
     */
    public function addMastery(\Psi\AppBundle\Entity\Mastery $mastery)
    {
        $this->masteries[] = $mastery;

        return $this;
    }

    /**
     * Remove mastery
     *
     * @param \Psi\AppBundle\Entity\Mastery $mastery
     */
    public function removeMastery(\Psi\AppBundle\Entity\Mastery $mastery)
    {
        $this->masteries->removeElement($mastery);
    }

    /**
     * Get masteries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMasteries()
    {
        return $this->masteries;
    }
}
