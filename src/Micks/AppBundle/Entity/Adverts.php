<?php

namespace Micks\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Micks\AppBundle\Entity\Adverts
 *
 * @ORM\Table(name="adverts")
 * @ORM\Entity
 */
class Adverts
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $price
     *
     * @ORM\Column(name="price", type="string", length=45, nullable=true)
     */
    private $price;

    /**
     * @var integer $rooms
     *
     * @ORM\Column(name="rooms", type="integer", nullable=true)
     */
    private $rooms;

    /**
     * @var boolean $flat
     *
     * @ORM\Column(name="flat", type="boolean", nullable=true)
     */
    private $flat;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string $master
     *
     * @ORM\Column(name="master", type="string", length=45, nullable=true)
     */
    private $master;

    /**
     * @var string $phone
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=false)
     */
    private $phone;

    /**
     * @var \DateTime $time
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var Sites
     *
     * @ORM\ManyToOne(targetEntity="Sites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     * })
     */
    private $site;



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
     * Set price
     *
     * @param string $price
     * @return Adverts
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     * @return Adverts
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    
        return $this;
    }

    /**
     * Get rooms
     *
     * @return integer 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set flat
     *
     * @param boolean $flat
     * @return Adverts
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    
        return $this;
    }

    /**
     * Get flat
     *
     * @return boolean 
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Adverts
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
     * Set master
     *
     * @param string $master
     * @return Adverts
     */
    public function setMaster($master)
    {
        $this->master = $master;
    
        return $this;
    }

    /**
     * Get master
     *
     * @return string 
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Adverts
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Adverts
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set site
     *
     * @param Micks\AppBundle\Entity\Sites $site
     * @return Adverts
     */
    public function setSite(\Micks\AppBundle\Entity\Sites $site = null)
    {
        $this->site = $site;
    
        return $this;
    }

    /**
     * Get site
     *
     * @return Micks\AppBundle\Entity\Sites 
     */
    public function getSite()
    {
        return $this->site;
    }
}