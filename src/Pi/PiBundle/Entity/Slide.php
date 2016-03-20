<?php

namespace Pi\PiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slide
 *
 * @ORM\Table(name="slide", indexes={@ORM\Index(name="deal_Ref", columns={"deal_Ref"})})
 * @ORM\Entity
 */
class Slide
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
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

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
     * Set image
     *
     * @param string $image
     * @return Slide
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set dealRef
     *
     * @param \Pi\PiBundle\Entity\Deal $dealRef
     * @return Slide
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
