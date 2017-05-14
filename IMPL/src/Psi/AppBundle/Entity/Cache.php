<?php
namespace Psi\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Cache
 *
 * @ORM\Entity()
 * @ORM\Table(name="cache")
 */
class Cache
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
     * @var resource
     * @ORM\Column(name="data", type="blob")
     */
    protected $data;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */     
    protected $createdAt;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */      
    protected $updatedAt;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="expiration_time", type="integer")
     */      
    protected $expirationTime;
    

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
     * Set data
     *
     * @param string $data
     *
     * @return Cache
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cache
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Cache
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
     * Set expirationTime
     *
     * @param integer $expirationTime
     *
     * @return Cache
     */
    public function setExpirationTime($expirationTime)
    {
        $this->expirationTime = $expirationTime;

        return $this;
    }

    /**
     * Get expirationTime
     *
     * @return integer
     */
    public function getExpirationTime()
    {
        return $this->expirationTime;
    }
}
