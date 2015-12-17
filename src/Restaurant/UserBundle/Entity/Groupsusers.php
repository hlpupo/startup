<?php

namespace Restaurant\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupsusers
 *
 * @ORM\Table(name="groupsusers")
 * @ORM\Entity
 */
class Groupsusers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="groupID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupid;

    /**
     * @var string
     *
     * @ORM\Column(name="groupName", type="string", length=50, nullable=true)
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
