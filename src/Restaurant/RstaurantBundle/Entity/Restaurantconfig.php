<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurantconfig
 *
 * @ORM\Table(name="restaurantconfig")
 * @ORM\Entity
 */
class Restaurantconfig
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="configId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configid;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true, name="cantOrders")
     */
    private $cantorders;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true, name="cantPictures")
     */
    private $cantpictures;


    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Restaurants", mappedBy="configid")
     */
    private $config;


    /**
     * Get configid
     *
     * @return integer
     */
    public function getConfigid()
    {
        return $this->configid;
    }

    /**
     * Set cantorders
     *
     * @param integer $cantorders
     *
     * @return Restaurantconfig
     */
    public function setCantorders($cantorders)
    {
        $this->cantorders = $cantorders;

        return $this;
    }

    /**
     * Get cantorders
     *
     * @return integer
     */
    public function getCantorders()
    {
        return $this->cantorders;
    }

    /**
     * Set cantpictures
     *
     * @param integer $cantpictures
     *
     * @return Restaurantconfig
     */
    public function setCantpictures($cantpictures)
    {
        $this->cantpictures = $cantpictures;

        return $this;
    }

    /**
     * Get cantpictures
     *
     * @return integer
     */
    public function getCantpictures()
    {
        return $this->cantpictures;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->config = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add config
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurants $config
     *
     * @return Restaurantconfig
     */
    public function addConfig(\Restaurant\RstaurantBundle\Entity\Restaurants $config)
    {
        $this->config[] = $config;

        return $this;
    }

    /**
     * Remove config
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurants $config
     */
    public function removeConfig(\Restaurant\RstaurantBundle\Entity\Restaurants $config)
    {
        $this->config->removeElement($config);
    }

    /**
     * Get config
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConfig()
    {
        return $this->config;
    }
}
