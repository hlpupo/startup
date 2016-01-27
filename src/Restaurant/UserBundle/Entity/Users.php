<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupInterface;
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
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * 
     * 
     * 
     */
    private $userId;


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
     * @ORM\ManyToMany(targetEntity="Restaurant\UserBundle\Entity\Groupsusers", inversedBy="user_id")
     * @ORM\JoinTable(name="fos_user_user_group",
     *          joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     *     )
     */
    protected $groups;

    /**
     * @ORM\OneToMany(targetEntity="Restaurant\RstaurantBundle\Entity\Advert", mappedBy="id")
     */
    private $advert;

  public function __construct(){
    parent::__construct();
    $this->groups =  new ArrayCollection();
  }

  /**
   * @return mixed
   */
  public function getGroups() {
    return $this->groups;
  }

  /**
   * @param mixed $groups
   */
  public function setGroups(\Restaurant\UserBundle\Entity\Groupsusers $groups) {
    $this->groups = $groups;
  }

  public function addGroupUser(\Restaurant\UserBundle\Entity\Groupsusers $group) {
    $this->groups[] = $group;
    $group->addUserId($this);


    return $this;
  }


  /**
     * Get userid
     *
     * @return integer
     */
    public function getid()
    {
        return $this->id;
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
