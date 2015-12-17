<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Municipality
 *
 * @ORM\Table(name="municipality", indexes={@ORM\Index(name="R_4", columns={"provinceId"})})
 * @ORM\Entity
 */
class Municipality
{
    /**
     * @var integer
     *
     * @ORM\Column(name="municipalityId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $municipalityid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=true)
     */
    private $name;

    /**
     * @var \Province
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Province")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceId", referencedColumnName="provinceId")
     * })
     */
    private $provinceid;


}

