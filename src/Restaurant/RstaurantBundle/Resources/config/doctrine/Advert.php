<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 *
 * @ORM\Table(name="advert", indexes={@ORM\Index(name="R_20", columns={"userId"})})
 * @ORM\Entity
 */
class Advert
{
    /**
     * @var integer
     *
     * @ORM\Column(name="advertId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $advertid;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantUsers", type="integer", nullable=true)
     */
    private $cantusers;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptions", type="string", length=18, nullable=true)
     */
    private $descriptions;

    /**
     * @var integer
     *
     * @ORM\Column(name="expenseRange", type="integer", nullable=true)
     */
    private $expenserange;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=20, nullable=true)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="userId")
     * })
     */
    private $userid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurants", mappedBy="advertid")
     */
    private $restaurantid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->restaurantid = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

