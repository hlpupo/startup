<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurants
 *
 * @ORM\Table(name="restaurants", indexes={@ORM\Index(name="R_21", columns={"userId"})})
 * @ORM\Entity
 */
class Restaurants
{
    /**
     * @var integer
     *
     * @ORM\Column(name="restaurantId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $restaurantid;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cif", type="string", length=20, nullable=true)
     */
    private $cif;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=20, nullable=true)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="text", length=65535, nullable=true)
     */
    private $logo;

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
     * @ORM\ManyToMany(targetEntity="Advert", mappedBy="restaurantid")
     */
    private $advertid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->advertid = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

