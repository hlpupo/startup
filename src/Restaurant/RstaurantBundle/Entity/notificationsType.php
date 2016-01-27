<?php

namespace Restaurant\RstaurantBundle\Entity;

/**
 * notificationsType
 */
class notificationsType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Restaurant\RstaurantBundle\Entity\notifications
     */
    private $notifications;


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
     * Set type
     *
     * @param string $type
     *
     * @return notificationsType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set notifications
     *
     * @param \Restaurant\RstaurantBundle\Entity\notifications $notifications
     *
     * @return notificationsType
     */
    public function setNotifications(\Restaurant\RstaurantBundle\Entity\notifications $notifications = null)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return \Restaurant\RstaurantBundle\Entity\notifications
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}

