<?php



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


}

