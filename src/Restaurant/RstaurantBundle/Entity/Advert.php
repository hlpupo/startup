<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Restaurant\UserBundle\Entity;

/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity
 */
class Advert
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="advertId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $advertid;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true, name="cantUsers")
     */
    private $cantusers;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=18, nullable=true, name="descriptions")
     */
    private $descriptions;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true, name="expenseRange")
     */
    private $expenserange;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="category")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="name")
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true, name="date")
     */
    private $date;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\UserBundle\Entity\Users", inversedBy="advert")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * 
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurant\RstaurantBundle\Entity\Restaurants", inversedBy="advertid")
     * @ORM\JoinTable(
     *     name="restaurantadvert",
     *     joinColumns={@ORM\JoinColumn(name="advertid", referencedColumnName="advertId", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="restaurantid", referencedColumnName="id")}
     * )
     */
    private $restaurantid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->restaurantid = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get advertid
     *
     * @return integer
     */
    public function getAdvertid()
    {
        return $this->advertid;
    }

    /**
     * Set cantusers
     *
     * @param integer $cantusers
     *
     * @return Advert
     */
    public function setCantusers($cantusers)
    {
        $this->cantusers = $cantusers;

        return $this;
    }

    /**
     * Get cantusers
     *
     * @return integer
     */
    public function getCantusers()
    {
        return $this->cantusers;
    }

    /**
     * Set descriptions
     *
     * @param string $descriptions
     *
     * @return Advert
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
     * Set expenserange
     *
     * @param integer $expenserange
     *
     * @return Advert
     */
    public function setExpenserange($expenserange)
    {
        $this->expenserange = $expenserange;

        return $this;
    }

    /**
     * Get expenserange
     *
     * @return integer
     */
    public function getExpenserange()
    {
        return $this->expenserange;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Advert
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Advert
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set userid
     *
     * @param \Restaurant\UserBundle\Entity\Users $userid
     *
     * @return Advert
     */
    public function setUserid(\Restaurant\UserBundle\Entity\Users $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Restaurant\UserBundle\Entity\Users
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Add restaurantid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurants $restaurantid
     *
     * @return Advert
     */
    public function addRestaurantid(\Restaurant\RstaurantBundle\Entity\Restaurants $restaurantid)
    {
        $this->restaurantid[] = $restaurantid;

        return $this;
    }

    /**
     * Remove restaurantid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Restaurants $restaurantid
     */
    public function removeRestaurantid(\Restaurant\RstaurantBundle\Entity\Restaurants $restaurantid)
    {
        $this->restaurantid->removeElement($restaurantid);
    }

    /**
     * Get restaurantid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }

    /**
     * Set id
     *
     * @param \Restaurant\UserBundle\Entity\Users $id
     *
     * @return Advert
     */
    public function setId(\Restaurant\UserBundle\Entity\Users $id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \Restaurant\UserBundle\Entity\Users
     */
    public function getId()
    {
        return $this->id;
    }
}
