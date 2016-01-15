<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Menudata
 *
 * @ORM\Table(name="menudata", indexes={@ORM\Index(name="R_5", columns={"menuId"})})
 * @ORM\Entity
 */
class Menudata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dataId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dataid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", length=65535, nullable=true)
     */
    private $url;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menuId", referencedColumnName="menuId")
     * })
     */
    private $menuid;


}

