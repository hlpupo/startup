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
     * @ORM\Id
     * @ORM\Column(type="integer", name="municipalityId")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $municipalityid;

    /**
     * @ORM\Column(type="string", length=20, nullable=true, name="name")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\UserBundle\Entity\Users", mappedBy="municipalityid")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant\UserBundle\Entity\Province", inversedBy="municipality")
     * @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * 
     * 
     */
    private $province;


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
     * Set user
     *
     * @param \Restaurant\UserBundle\Entity\Users $user
     *
     * @return Municipality
     */
    public function setUser(\Restaurant\UserBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Restaurant\UserBundle\Entity\Users
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
