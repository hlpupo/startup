<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Dialogtext
 *
 * @ORM\Table(name="dialogtext", indexes={@ORM\Index(name="R_8", columns={"dialogId"})})
 * @ORM\Entity
 */
class Dialogtext
{
    /**
     * @var integer
     *
     * @ORM\Column(name="dialogTextId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $dialogtextid;

    /**
     * @var string
     *
     * @ORM\Column(name="sender", type="string", length=20, nullable=true)
     */
    private $sender;

    /**
     * @var string
     *
     * @ORM\Column(name="dialog", type="text", length=65535, nullable=true)
     */
    private $dialog;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \Dialog
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Dialog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dialogId", referencedColumnName="dialogId")
     * })
     */
    private $dialogid;


}

