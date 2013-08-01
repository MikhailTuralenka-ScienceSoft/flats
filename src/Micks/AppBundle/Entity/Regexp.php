<?php

namespace Micks\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Micks\AppBundle\Entity\Regexp
 *
 * @ORM\Table(name="regexp")
 * @ORM\Entity
 */
class Regexp
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string $value
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

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
     * Set name
     *
     * @param string $name
     * @return Regexp
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
     * Set value
     *
     * @param string $value
     * @return Regexp
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
     * Set site
     *
     * @param Micks\AppBundle\Entity\Sites $site
     * @return Regexp
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