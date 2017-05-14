<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Summoner
 *
 * @ORM\Entity()
 * @ORM\Table(name="summoner"),indexes={@ORM\Index(name="search_idx", columns={"name","external_id"})}
 */
class Summoner
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
     * @var integer
     * @ORM\Column(name="profile_icon_id", type="integer") 
     */
    protected $profileIconId;

    /**
     *
     * @var string
     * @ORM\Column(name="name", type="string") 
     */
    protected $name;

    /**
     *
     * @var integer
     * @ORM\Column(name="level", type="integer") 
     */
    protected $summonerLevel;

    /**
     *
     * @var string
     * @ORM\Column(name="external_id", type="bigint") 
     */
    protected $externalId;

    /**
     *
     * @var string
     * @ORM\Column(name="account_id", type="bigint")
     */
    protected $accountId;

    /**
     *
     * @var RunePage[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="Psi\AppBundle\Entity\RunePage")
     * @ORM\JoinTable(name="summoner_rune_pages") 
     */
    protected $runePages;

    /**
     *
     * @var MasteryPage[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="Psi\AppBundle\Entity\MasteryPage")
     * @ORM\JoinTable(name="summoner_mastery_pages") 
     */
    protected $masteryPages;
    
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
        $this->runePages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->masteryPages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set profileIconId
     *
     * @param integer $profileIconId
     *
     * @return Summoner
     */
    public function setProfileIconId($profileIconId)
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    /**
     * Get profileIconId
     *
     * @return integer
     */
    public function getProfileIconId()
    {
        return $this->profileIconId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Summoner
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
     * Set summonerLevel
     *
     * @param integer $summonerLevel
     *
     * @return Summoner
     */
    public function setSummonerLevel($summonerLevel)
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }

    /**
     * Get summonerLevel
     *
     * @return integer
     */
    public function getSummonerLevel()
    {
        return $this->summonerLevel;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return Summoner
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
     * Set accountId
     *
     * @param integer $accountId
     *
     * @return Summoner
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return Summoner
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
     * @return Summoner
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
     * Add runePage
     *
     * @param \Psi\AppBundle\Entity\RunePage $runePage
     *
     * @return Summoner
     */
    public function addRunePage(\Psi\AppBundle\Entity\RunePage $runePage)
    {
        $this->runePages[] = $runePage;

        return $this;
    }

    /**
     * Remove runePage
     *
     * @param \Psi\AppBundle\Entity\RunePage $runePage
     */
    public function removeRunePage(\Psi\AppBundle\Entity\RunePage $runePage)
    {
        $this->runePages->removeElement($runePage);
    }

    /**
     * Get runePages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRunePages()
    {
        return $this->runePages;
    }

    /**
     * Add masteryPage
     *
     * @param \Psi\AppBundle\Entity\MasteryPage $masteryPage
     *
     * @return Summoner
     */
    public function addMasteryPage(\Psi\AppBundle\Entity\MasteryPage $masteryPage)
    {
        $this->masteryPages[] = $masteryPage;

        return $this;
    }

    /**
     * Remove masteryPage
     *
     * @param \Psi\AppBundle\Entity\MasteryPage $masteryPage
     */
    public function removeMasteryPage(\Psi\AppBundle\Entity\MasteryPage $masteryPage)
    {
        $this->masteryPages->removeElement($masteryPage);
    }

    /**
     * Get masteryPages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMasteryPages()
    {
        return $this->masteryPages;
    }
}
