<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatchStat
 *
 * @ORM\Entity()
 * @ORM\Table(name="match_stat",indexes={@ORM\Index(name="search_idx", columns={"name","match_id"})})
 */
class MatchStat
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
     * @var string
     * @ORM\Column(name="type", type="string", length=32)
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=64)
     */
    protected $statname;

    /**
     * @var string
     * @ORM\Column(name="value", type="string", length=64)
     */
    protected $value;

    /**
     * @var Match 
     * @ORM\ManyToOne(targetEntity="Psi\AppBundle\Entity\Match")
     */
    protected $match;

    /**
     * @var string
     * @ORM\Column(name="external_id", type="bigint")
     */
    protected $externalId;
    
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
     * Set type
     *
     * @param string $type
     *
     * @return MatchStat
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set statname
     *
     * @param string $statname
     *
     * @return MatchStat
     */
    public function setStatname($statname)
    {
        $this->statname = $statname;

        return $this;
    }

    /**
     * Get statname
     *
     * @return string
     */
    public function getStatname()
    {
        return $this->statname;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return MatchStat
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return MatchStat
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
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return MatchStat
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
     * @return MatchStat
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
     * @return MatchStat
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
