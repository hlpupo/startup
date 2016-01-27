<?php

namespace Restaurant\RstaurantBundle\Entity;

/**
 * notifications
 */
class notifications
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var boolean
     */
    private $read;

    /**
     * @var \Restaurant\RstaurantBundle\Entity\notificationsType
     */
    private $notificationsType;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return notifications
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set read
     *
     * @param boolean $read
     *
     * @return notifications
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set notificationsType
     *
     * @param \Restaurant\RstaurantBundle\Entity\notificationsType $notificationsType
     *
     * @return notifications
     */
    public function setNotificationsType(\Restaurant\RstaurantBundle\Entity\notificationsType $notificationsType = null)
    {
        $this->notificationsType = $notificationsType;

        return $this;
    }

    /**
     * Get notificationsType
     *
     * @return \Restaurant\RstaurantBundle\Entity\notificationsType
     */
    public function getNotificationsType()
    {
        return $this->notificationsType;
    }
}

