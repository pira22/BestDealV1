<?php

namespace Pi\PiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dealcourant
 *@ORM\Entity(repositoryClass="Pi\PiBundle\Entity\DealcourantRepository")
 * @ORM\Table(name="dealcourant", indexes={@ORM\Index(name="fk_dealcourant_deal_idx", columns={"deal_ref"})})
 * @ORM\Entity
 */
class Dealcourant {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

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
