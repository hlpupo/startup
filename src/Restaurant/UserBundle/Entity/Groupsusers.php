<?php

namespace Restaurant\UserBundle\Entity;

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
    public function __construct(){
        parent::__construct();
    }
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="groupID")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, name="groupName")
     */
    private $groupname;



    /**
     * Get groupid
     *
     * @return integer
     */
    public function getGroupid()
    {
        return $this->groupid;
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
}
