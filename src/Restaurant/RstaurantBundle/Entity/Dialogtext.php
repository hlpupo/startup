<?php

namespace Restaurant\RstaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dialogtext
 *
 * @ORM\Table(name="dialogtext")
 * @ORM\Entity
 */
class Dialogtext
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="dialogTextId")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $dialogtextid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true, name="sender")
     */
    private $sender;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=65535, nullable=true, name="dialog")
     */
    private $dialog;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true, name="date")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true, name="status")
     */
    private $status;

    /**
     * @var \Dialog
     *
     * @ORM\Id
     * 
     * @ORM\OneToOne(targetEntity="Restaurant\RstaurantBundle\Entity\Dialog")
     * @ORM\JoinColumn(name="dialogid", referencedColumnName="dialogId", nullable=false, unique=true)
     * 
     */
    private $dialogid;



    /**
     * Set dialogtextid
     *
     * @param integer $dialogtextid
     *
     * @return Dialogtext
     */
    public function setDialogtextid($dialogtextid)
    {
        $this->dialogtextid = $dialogtextid;

        return $this;
    }

    /**
     * Get dialogtextid
     *
     * @return integer
     */
    public function getDialogtextid()
    {
        return $this->dialogtextid;
    }

    /**
     * Set sender
     *
     * @param string $sender
     *
     * @return Dialogtext
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set dialog
     *
     * @param string $dialog
     *
     * @return Dialogtext
     */
    public function setDialog($dialog)
    {
        $this->dialog = $dialog;

        return $this;
    }

    /**
     * Get dialog
     *
     * @return string
     */
    public function getDialog()
    {
        return $this->dialog;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Dialogtext
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Dialogtext
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dialogid
     *
     * @param \Restaurant\RstaurantBundle\Entity\Dialog $dialogid
     *
     * @return Dialogtext
     */
    public function setDialogid(\Restaurant\RstaurantBundle\Entity\Dialog $dialogid)
    {
        $this->dialogid = $dialogid;

        return $this;
    }

    /**
     * Get dialogid
     *
     * @return \Restaurant\RstaurantBundle\Entity\Dialog
     */
    public function getDialogid()
    {
        return $this->dialogid;
    }
}
