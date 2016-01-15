<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menudata
 *
 * @ORM\Table(name="menudata")
 * @ORM\Entity
 */
class Menudata
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="dataId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dataid;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=65535, nullable=true, name="url")
     */
    private $url;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Menu")
     * @ORM\JoinColumn(name="menuId", referencedColumnName="menuId")
     * 
     */
    private $menuid;



    /**
     * Get dataid
     *
     * @return integer
     */
    public function getDataid()
    {
        return $this->dataid;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Menudata
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set menuid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Menu $menuid
     *
     * @return Menudata
     */
    public function setMenuid(\Restaurant\RstaurantBundle\Entity\Menu $menuid = null)
    {
        $this->menuid = $menuid;

        return $this;
    }

    /**
     * Get menuid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Menu
     */
    public function getMenuid()
    {
        return $this->menuid;
    }
}
