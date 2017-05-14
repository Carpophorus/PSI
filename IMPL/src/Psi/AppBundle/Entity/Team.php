<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Entity()
 * @ORM\Table(name="match_team")
 */
class Team
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
     * @var Match 
     * @ORM\ManyToOne(targetEntity="Psi\AppBundle\Entity\Match")
     */
    protected $match;
    
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
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return Team
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
     * @return Team
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
     * Set match
     *
     * @param \Psi\AppBundle\Entity\Match $match
     *
     * @return Team
     */
    public function setMatch(\Psi\AppBundle\Entity\Match $match = null)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get match
     *
     * @return \Psi\AppBundle\Entity\Match
     */
    public function getMatch()
    {
        return $this->match;
    }
}
