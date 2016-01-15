<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="firstnamep", type="string")
 * @ORM\DiscriminatorMap({"users"="Restaurant\UserBundle\Entity\Users","restaurants"="Restaurant\RstaurantBundle\Entity\Restaurants"})
 */
class Users extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="userId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=true, name="firstname")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, name="lastname")
     */
    private $lastname;

    /**
     * 
     * @ORM\JoinColumn(name="municipalityId", referencedColumnName="municipalityId", unique=true)
     * @ORM\OneToOne(targetEntity="Restaurant\UserBundle\Entity\Municipality", inversedBy="user")
     */
    private $municipalityid;

    /**
     * @var \Groupsusers
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\UserBundle\Entity\Groupsusers")
     * @ORM\JoinColumn(name="groupID", referencedColumnName="groupID")
     * 
     */
    private $groupid;

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RstaurantBundle\Entity\Advert", mappedBy="userId")
     */
    private $advert;

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }


    /**
     * Set municipalityid
     *
     * @param \Restaurant\UserBundle\Entity\Municipality $municipalityid
     *
     * @return Users
     */
    public function setMunicipalityid(\Restaurant\UserBundle\Entity\Municipality $municipalityid = null)
    {
        $this->municipalityid = $municipalityid;

        return $this;
    }

    /**
     * Get municipalityid
     *
     * @return \Restaurant\UserBundle\Entity\Municipality
     */
    public function getMunicipalityid()
    {
        return $this->municipalityid;
    }

    /**
     * Set groupid
     *
     * @param \Restaurant\UserBundle\Entity\Groupsusers $groupid
     *
     * @return Users
     */
    public function setGroupid(\Restaurant\UserBundle\Entity\Groupsusers $groupid = null)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Get groupid
     *
     * @return \Restaurant\UserBundle\Entity\Groupsusers
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    public function __construct(){
        parent::__construct();
    }




    /**
     * Add advert
     *
     * @param \Restaurant\RstaurantBundle\Entity\Advert $advert
     *
     * @return Users
     */
    public function addAdvert(\Restaurant\RstaurantBundle\Entity\Advert $advert)
    {
        $this->advert[] = $advert;

        return $this;
    }

    /**
     * Remove advert
     *
     * @param \Restaurant\RstaurantBundle\Entity\Advert $advert
     */
    public function removeAdvert(\Restaurant\RstaurantBundle\Entity\Advert $advert)
    {
        $this->advert->removeElement($advert);
    }

    /**
     * Get advert
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvert()
    {
        return $this->advert;
    }
}
