<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipality
 *
 * @ORM\Table(name="municipality")
 * @ORM\Entity
 */
class Municipality
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="municipalityId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $municipalityid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="name")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\UserBundle\Entity\Users", mappedBy="municipalityid")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\UserBundle\Entity\Province", inversedBy="municipality")
     * @ORM\JoinColumn(name="province_provinceid", referencedColumnName="provinceId")
     */
    private $province;

    /**
     * @var \Province
     *
     *
     * 
     * 
     * 
     */
    private $provinceid;

  

    /**
     * Set municipalityid
     *
     * @param integer $municipalityid
     *
     * @return Municipality
     */
    public function setMunicipalityid($municipalityid)
    {
        $this->municipalityid = $municipalityid;

        return $this;
    }

    /**
     * Get municipalityid
     *
     * @return integer
     */
    public function getMunicipalityid()
    {
        return $this->municipalityid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Municipality
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
     * Set provinceid
     *
     * @param \Restaurant\UserBundle\Entity\Province $provinceid
     *
     * @return Municipality
     */
    public function setProvinceid(\Restaurant\UserBundle\Entity\Province $provinceid)
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
     * Constructor
     */
    public function __construct()
    {

    }





    /**
     * Add user
     *
     * @param \Restaurant\UserBundle\Entity\Users $user
     *
     * @return Municipality
     */
    public function addUser(\Restaurant\UserBundle\Entity\Users $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Restaurant\UserBundle\Entity\Users $user
     */
    public function removeUser(\Restaurant\UserBundle\Entity\Users $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set province
     *
     * @param \Restaurant\UserBundle\Entity\Province $province
     *
     * @return Municipality
     */
    public function setProvince(\Restaurant\UserBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \Restaurant\UserBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }
}
