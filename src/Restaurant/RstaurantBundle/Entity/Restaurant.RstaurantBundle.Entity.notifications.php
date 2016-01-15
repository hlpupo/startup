<?php
namespace Restaurant\RstaurantBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class notifications
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $read;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RstaurantBundle\Entity\notificationsType", inversedBy="notifications")
     * @ORM\JoinColumn(name="notifications_type_id", referencedColumnName="id", unique=true)
     */
    private $notificationsType;
}