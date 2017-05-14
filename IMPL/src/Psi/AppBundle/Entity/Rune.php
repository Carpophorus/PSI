<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rune
 *
 * @ORM\Entity()
 * @ORM\Table(name="summoner_rune")
 */
class Rune
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
     * @var RunePage
     * @ORM\ManyToOne(targetEntity="Psi\AppBundle\Entity\RunePage")
     */
    protected $runePage;
    
    /**
     *
     * @var integer
     *  @ORM\Column(name="slot_id", type="integer") 
     */
    protected $slotId;
    
    /**
     *
     * @var integer
     * @ORM\Column(name="rune_id", type="integer")   
     */
    protected $runeId;
    
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
     * Set slotId
     *
     * @param integer $slotId
     *
     * @return Rune
     */
    public function setSlotId($slotId)
    {
        $this->slotId = $slotId;

        return $this;
    }

    /**
     * Get slotId
     *
     * @return integer
     */
    public function getSlotId()
    {
        return $this->slotId;
    }

    /**
     * Set runeId
     *
     * @param integer $runeId
     *
     * @return Rune
     */
    public function setRuneId($runeId)
    {
        $this->runeId = $runeId;

        return $this;
    }

    /**
     * Get runeId
     *
     * @return integer
     */
    public function getRuneId()
    {
        return $this->runeId;
    }

    /**
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return Rune
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
     * @return Rune
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
     * Set runePage
     *
     * @param \Psi\AppBundle\Entity\RunePage $runePage
     *
     * @return Rune
     */
    public function setRunePage(\Psi\AppBundle\Entity\RunePage $runePage = null)
    {
        $this->runePage = $runePage;

        return $this;
    }

    /**
     * Get runePage
     *
     * @return \Psi\AppBundle\Entity\RunePage
     */
    public function getRunePage()
    {
        return $this->runePage;
    }
}
