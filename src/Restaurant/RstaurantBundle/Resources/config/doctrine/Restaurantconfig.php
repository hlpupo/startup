<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurantconfig
 *
 * @ORM\Table(name="restaurantconfig", indexes={@ORM\Index(name="R_7", columns={"restaurantId"})})
 * @ORM\Entity
 */
class Restaurantconfig
{
    /**
     * @var integer
     *
     * @ORM\Column(name="configId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configid;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantOrders", type="integer", nullable=true)
     */
    private $cantorders;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantPictures", type="integer", nullable=true)
     */
    private $cantpictures;

    /**
     * @var \Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantId", referencedColumnName="restaurantId")
     * })
     */
    private $restaurantid;


}

