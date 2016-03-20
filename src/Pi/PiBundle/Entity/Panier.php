<?php

namespace Pi\PiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", uniqueConstraints={@ORM\UniqueConstraint(name="deal_Ref", columns={"deal_Ref"})})
 * @ORM\Entity
 */
class Panier
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
     * @var string
     *
     * @ORM\Column(name="cle", type="string", length=255, nullable=false)
     */
    private $cle;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \Deal
     *
     * @ORM\ManyToOne(targetEntity="Deal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deal_Ref", referencedColumnName="ref")
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
     * Set cle
     *
     * @param string $cle
     * @return Panier
     */
    public function setCle($cle)
    {
        $this->cle = $cle;

        return $this;
    }

    /**
     * Get cle
     *
     * @return string 
     */
    public function getCle()
    {
        return $this->cle;
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

    /**
     * Set dealRef
     *
     * @param \Pi\PiBundle\Entity\Deal $dealRef
     * @return Panier
     */
    public function setDealRef(\Pi\PiBundle\Entity\Deal $dealRef = null)
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
}
