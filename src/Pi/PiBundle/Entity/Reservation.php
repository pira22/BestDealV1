<?php

namespace Pi\PiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Pi\PiBundle\Entity\Client;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="client_id", columns={"client_id", "deal_ref"}), @ORM\Index(name="deal_ref", columns={"deal_ref"}), @ORM\Index(name="IDX_42C8495519EB6921", columns={"client_id"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateres", type="datetime", nullable=false)
     */
    private $dateres;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid", type="integer", nullable=false)
     */
    private $valid = '0';

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \Deal
     *
     * @ORM\ManyToOne(targetEntity="Deal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deal_ref", referencedColumnName="ref")
     * })
     */
    private $dealRef;
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    public function __construct() {
       
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateres
     *
     * @param \DateTime $dateres
     * @return Reservation
     */
    public function setDateres($dateres)
    {
        $this->dateres = $dateres;

        return $this;
    }

    /**
     * Get dateres
     *
     * @return \DateTime 
     */
    public function getDateres()
    {
        return $this->dateres;
    }

    /**
     * Set valid
     *
     * @param integer $valid
     * @return Reservation
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return integer 
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set client
     *
     * @param \Pi\PiBundle\Entity\Client $client
     * @return Reservation
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Pi\PiBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set dealRef
     *
     * @param \Pi\PiBundle\Entity\Deal $dealRef
     * @return Reservation
     */
    public function setDealRef(\Pi\PiBundle\Entity\Deal $dealRef )
    {
        $this->dealRef = $dealRef;

        return $this;
    }

    /**
     * Get dealRef
     *
     * @return \Pi\PiBundle\Entity\Deal 
     */
    public function getDealRef()
    {
        return $this->dealRef;
    }
     /**
     * Set cle
     *
     * @param integer $quantite
     * @return Panier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}
