<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
/**
 * Province
 *
 * @ORM\Table(name="province")
 * @ORM\Entity(repositoryClass="Restaurant\UserBundle\Entity\ProvinceRepository")
 */
class Province
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="provinceId")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provinceid;

    /**
     * @ORM\Column(type="string", length=20, nullable=true, name="name")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\UserBundle\Entity\Municipality", mappedBy="province")
     */
    private $municipality;


    /**
     * Get provinceid
     *
     * @return integer
     */
    public function getProvinceid()
    {
        return $this->provinceid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Province
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
     * Set municipality
     *
     * @param \Restaurant\UserBundle\Entity\Municipality $municipality
     *
     * @return Province
     */
    public function setMunicipality(\Restaurant\UserBundle\Entity\Municipality $municipality = null)
    {
        $this->municipality = $municipality;

        return $this;
    }

    /**
     * Get municipality
     *
     * @return \Restaurant\UserBundle\Entity\Municipality
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }
}
