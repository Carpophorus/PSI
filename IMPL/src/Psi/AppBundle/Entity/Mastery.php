<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mastery
 *
 * @ORM\Entity()
 * @ORM\Table(name="summoner_mastery")
 */
class Mastery
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
     * @var MasteryPage
     * @ORM\ManyToOne(targetEntity="Psi\AppBundle\Entity\MasteryPage")
     */
    protected $masterypage;

    /**
     * @var integer
     * @ORM\Column(name="external_id", type="integer")
     */
    protected $external_id;

    /**
     * @var integer
     * @ORM\Column(name="rank", type="integer")
     */
    protected $rank;
    
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

    /**
     * Set rank
     *
     * @param integer $rank
     *
     * @return Mastery
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return Mastery
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
     * @return Mastery
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
     * Set masterypage
     *
     * @param \Psi\AppBundle\Entity\MasteryPage $masterypage
     *
     * @return Mastery
     */
    public function setMasterypage(\Psi\AppBundle\Entity\MasteryPage $masterypage = null)
    {
        $this->masterypage = $masterypage;

        return $this;
    }

    /**
     * Get masterypage
     *
     * @return \Psi\AppBundle\Entity\MasteryPage
     */
    public function getMasterypage()
    {
        return $this->masterypage;
    }
}
