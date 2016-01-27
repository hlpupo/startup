<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;
use FOS\UserBundle\Model\Group;

/**
 * Groupsusers
 *
 * @ORM\Table(name="groupsusers")
 * @ORM\Entity
 */
class Groupsusers extends BaseGroup
{

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, name="groupName")
     */
    private $groupname;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurant\UserBundle\Entity\Users", mappedBy="groups")
     *
     */
    private $user_id;

    public function __construct(){
        //parent::__construct();
        $this->user_id = new ArrayCollection();
    }


    /**
     * Set groupname
     *
     * @param string $groupname
     *
     * @return Groupsusers
     */
    public function setGroupname($groupname)
    {
        $this->groupname = $groupname;

        return $this;
    }

    /**
     * Get groupname
     *
     * @return string
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * Add userId
     *
     * @param \Restaurant\UserBundle\Entity\Users $userId
     *
     * @return Groupsusers
     */
    public function addUserId(\Restaurant\UserBundle\Entity\Users $userId)
    {
        $this->user_id[] = $userId;

        return $this;
    }

    /**
     * Remove userId
     *
     * @param \Restaurant\UserBundle\Entity\Users $userId
     */
    public function removeUserId(\Restaurant\UserBundle\Entity\Users $userId)
    {
        $this->user_id->removeElement($userId);
    }

    /**
     * Get userId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
