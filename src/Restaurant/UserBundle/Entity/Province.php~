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
     * @var integer
     *
     * @ORM\Column(type="integer", name="provinceId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provinceid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="name")
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="Restaurant\UserBundle\Entity\Municipality", mappedBy="province")
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
     * Constructor
     */
    public function __construct()
    {
        $this->municipality = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add municipality
     *
     * @param \Restaurant\UserBundle\Entity\Municipality $municipality
     *
     * @return Province
     */
    public function addMunicipality(\Restaurant\UserBundle\Entity\Municipality $municipality)
    {
        $this->municipality[] = $municipality;

        return $this;
    }

    /**
     * Remove municipality
     *
     * @param \Restaurant\UserBundle\Entity\Municipality $municipality
     */
    public function removeMunicipality(\Restaurant\UserBundle\Entity\Municipality $municipality)
    {
        $this->municipality->removeElement($municipality);
    }

    /**
     * Get municipality
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
    }


}
