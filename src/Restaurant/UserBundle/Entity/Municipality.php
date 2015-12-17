<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipality
 *
 * @ORM\Table(name="municipality", indexes={@ORM\Index(name="R_4", columns={"provinceId"})})
 * @ORM\Entity
 */
class Municipality
{
    /**
     * @var integer
     *
     * @ORM\Column(name="municipalityId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $municipalityid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=true)
     */
    private $name;

    /**
     * @var \Province
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Province")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
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
}
