<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="R_1", columns={"groupID"}), @ORM\Index(name="R_2", columns={"provinceId"}), @ORM\Index(name="R_3", columns={"municipalityId", "provinceId"})})
 * @ORM\Entity
 */
class Users extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var \Groupsusers
     *
     * @ORM\ManyToOne(targetEntity="Groupsusers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupID", referencedColumnName="groupID")
     * })
     */
    private $groupid;

    /**
     * @var \Province
     *
     * @ORM\ManyToOne(targetEntity="Province")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
     */
    private $provinceid;

    /**
     * @var \Municipality
     *
     * @ORM\ManyToOne(targetEntity="Municipality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="municipalityId", referencedColumnName="municipalityId"),
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
     */
    private $municipalityid;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

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

    /**
     * Set provinceid
     *
     * @param \Restaurant\UserBundle\Entity\Province $provinceid
     *
     * @return Users
     */
    public function setProvinceid(\Restaurant\UserBundle\Entity\Province $provinceid = null)
    {
        $this->provinceid = $provinceid;

        return $this;
    }

    /**
     * Get provinceid
     *
     * @return \Restaurant\UserBundle\Entity\Province
     */
    public function getProvinceid()
    {
        return $this->provinceid;
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
}
