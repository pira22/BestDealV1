<?php

namespace Pi\PiAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @param \Pi\PiAdminBundle\Entity\Client $client
     * @return Reservation
     */
    public function setClient(\Pi\PiAdminBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Pi\PiAdminBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set dealRef
     *
     * @param \Pi\PiAdminBundle\Entity\Deal $dealRef
     * @return Reservation
     */
    public function setDealRef(\Pi\PiAdminBundle\Entity\Deal $dealRef = null)
    {
        $this->dealRef = $dealRef;

        return $this;
    }

    /**
     * Get dealRef
     *
     * @return \Pi\PiAdminBundle\Entity\Deal 
     */
    public function getDealRef()
    {
        return $this->dealRef;
    }
}
