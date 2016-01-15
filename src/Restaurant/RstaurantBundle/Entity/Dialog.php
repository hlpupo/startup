<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dialog
 *
 * @ORM\Table(name="dialog")
 * @ORM\Entity
 */
class Dialog
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="dialogId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dialogid;

    /**
     * @var \Advert
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Advert")
     * @ORM\JoinColumn(name="advertId", referencedColumnName="advertId")
     * 
     */
    private $advertid;



    /**
     * Get dialogid
     *
     * @return integer
     */
    public function getDialogid()
    {
        return $this->dialogid;
    }

    /**
     * Set advertid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Advert $advertid
     *
     * @return Dialog
     */
    public function setAdvertid(\Restaurant\RstaurantBundle\Entity\Advert $advertid = null)
    {
        $this->advertid = $advertid;

        return $this;
    }

    /**
     * Get advertid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Advert
     */
    public function getAdvertid()
    {
        return $this->advertid;
    }
}
