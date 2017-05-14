<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampionCache
 *
 * @ORM\Entity()
 * @ORM\Table(name="champion_cache")
 */
class ChampionCache
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
     * @ORM\Column(name="champion_id", type="integer")
     */
    protected $championId;
    
    /**
     *
     * @var string
     * @ORM\Column(name="cache_tag", type="string") 
     */
    protected $cacheTag;
    
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
     * Set championId
     *
     * @param integer $championId
     *
     * @return ChampionCache
     */
    public function setChampionId($championId)
    {
        $this->championId = $championId;

        return $this;
    }

    /**
     * Get championId
     *
     * @return integer
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Set cacheTag
     *
     * @param string $cacheTag
     *
     * @return ChampionCache
     */
    public function setCacheTag($cacheTag)
    {
        $this->cacheTag = $cacheTag;

        return $this;
    }

    /**
     * Get cacheTag
     *
     * @return string
     */
    public function getCacheTag()
    {
        return $this->cacheTag;
    }

    /**
     * Set importedAt
     *
     * @param \DateTime $importedAt
     *
     * @return ChampionCache
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
     * @return ChampionCache
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
}
