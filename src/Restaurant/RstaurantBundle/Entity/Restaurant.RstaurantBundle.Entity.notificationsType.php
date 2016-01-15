<?php
namespace Restaurant\RstaurantBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class notificationsType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="Restaurant\RstaurantBundle\Entity\notifications", mappedBy="notificationsType")
     */
    private $notifications;
}