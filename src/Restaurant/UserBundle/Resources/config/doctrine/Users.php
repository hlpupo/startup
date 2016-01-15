<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="R_1", columns={"groupID"}), @ORM\Index(name="R_2", columns={"provinceId"}), @ORM\Index(name="R_3", columns={"municipalityId", "provinceId"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=30, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @var \Province
     *
     * @ORM\ManyToOne(targetEntity="Province")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
     */
    private $provinceid;

    /**
     * @var \Municipality
     *
     * @ORM\ManyToOne(targetEntity="Municipality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="municipalityId", referencedColumnName="municipalityId"),
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
     */
    private $municipalityid;

    /**
     * @var \Groupsusers
     *
     * @ORM\ManyToOne(targetEntity="Groupsusers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupID", referencedColumnName="groupID")
     * })
     */
    private $groupid;


}

