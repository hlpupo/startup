<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Restaurant\UserBundle\Entity\Users;

/**
 * Restaurants
 *
 * @ORM\Table(name="restaurants")
 * @ORM\Entity
 */
class Restaurants extends Users
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, name="address")
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true, name="phone")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="cif")
     */
    private $cif;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="postalCode")
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=65535, nullable=true, name="logo")
     */
    private $logo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurant\RstaurantBundle\Entity\Advert", mappedBy="restaurantid")
     * 
     */
    private $advertid;


    /**
     * @var \RestaurantConfig
     *
     *
     * 
     * @ORM\JoinColumn(name="configId", referencedColumnName="configId", unique=true)
     * @ORM\OneToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Restaurantconfig", inversedBy="config")
     * 
     */
    private $configid;

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RstaurantBundle\Entity\Menu", mappedBy="userid")
     */
    private $menu;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->advertid = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Set address
     *
     * @param string $address
     *
     * @return Restaurants
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Restaurants
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cif
     *
     * @param string $cif
     *
     * @return Restaurants
     */
    public function setCif($cif)
    {
        $this->cif = $cif;

        return $this;
    }

    /**
     * Get cif
     *
     * @return string
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     *
     * @return Restaurants
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Restaurants
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }


    /**
     * Add advertid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Advert $advertid
     *
     * @return Restaurants
     */
    public function addAdvertid(\Restaurant\RstaurantBundle\Entity\Advert $advertid)
    {
        $this->advertid[] = $advertid;

        return $this;
    }

    /**
     * Remove advertid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Advert $advertid
     */
    public function removeAdvertid(\Restaurant\RstaurantBundle\Entity\Advert $advertid)
    {
        $this->advertid->removeElement($advertid);
    }

    /**
     * Get advertid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertid()
    {
        return $this->advertid;
    }

    /**
     * Set restaurantid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurantconfig $restaurantid
     *
     * @return Restaurantconfig
     */
    public function setConfig(\Restaurant\RstaurantBundle\Entity\Restaurantconfig $restaurantid = null)
    {
        $this->configid = $restaurantid;

        return $this;
    }

    /**
     * Get restaurantid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Restaurantconfig
     */
    public function getConfig()
    {
        return $this->configid;
    }

    /**
     * Set configid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurantconfig $configid
     *
     * @return Restaurants
     */
    public function setConfigid(\Restaurant\RstaurantBundle\Entity\Restaurantconfig $configid = null)
    {
        $this->configid = $configid;

        return $this;
    }

    /**
     * Get configid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Restaurantconfig
     */
    public function getConfigid()
    {
        return $this->configid;
    }

    /**
     * Add menu
     *
     * @param \Restaurant\RstaurantBundle\Entity\Menu $menu
     *
     * @return Restaurants
     */
    public function addMenu(\Restaurant\RstaurantBundle\Entity\Menu $menu)
    {
        $this->menu[] = $menu;

        return $this;
    }

    /**
     * Remove menu
     *
     * @param \Restaurant\RstaurantBundle\Entity\Menu $menu
     */
    public function removeMenu(\Restaurant\RstaurantBundle\Entity\Menu $menu)
    {
        $this->menu->removeElement($menu);
    }

    /**
     * Get menu
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
