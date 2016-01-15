<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="menuId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, name="name")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=65535, nullable=true, name="descriptions")
     */
    private $descriptions;

    /**
     * @var \Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Restaurants", inversedBy="menu")
     * @ORM\JoinColumn(name="userId", referencedColumnName="userId")
     * 
     */
    private $userid;



    /**
     * Get menuid
     *
     * @return integer
     */
    public function getMenuid()
    {
        return $this->menuid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Menu
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
     * Set descriptions
     *
     * @param string $descriptions
     *
     * @return Menu
     */
    public function setDescriptions($descriptions)
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * Get descriptions
     *
     * @return string
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Set userid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurants $userid
     *
     * @return Menu
     */
    public function setUserid(\Restaurant\RstaurantBundle\Entity\Restaurants $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Restaurants
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
