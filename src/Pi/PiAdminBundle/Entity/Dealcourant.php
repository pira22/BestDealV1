<?php

namespace Pi\PiAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dealcourant
 *
 * @ORM\Table(name="dealcourant", indexes={@ORM\Index(name="fk_dealcourant_deal_idx", columns={"deal_ref"})})
 * @ORM\Entity
 */
class Dealcourant
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
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Dealcourant
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dealRef
     *
     * @param \Pi\PiAdminBundle\Entity\Deal $dealRef
     * @return Dealcourant
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
