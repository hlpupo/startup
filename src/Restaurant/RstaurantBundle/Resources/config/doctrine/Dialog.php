<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Dialog
 *
 * @ORM\Table(name="dialog", indexes={@ORM\Index(name="R_9", columns={"advertId"})})
 * @ORM\Entity
 */
class Dialog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dialogId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dialogid;

    /**
     * @var \Advert
     *
     * @ORM\ManyToOne(targetEntity="Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="advertId", referencedColumnName="advertId")
     * })
     */
    private $advertid;


}

