<?php

namespace Pi\PiAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fb
 *
 * @ORM\Table(name="fb")
 * @ORM\Entity
 */
class Fb
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
     * @ORM\Column(name="idpseudo", type="string", length=30, nullable=false)
     */
    private $idpseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;



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
     * Set idpseudo
     *
     * @param string $idpseudo
     * @return Fb
     */
    public function setIdpseudo($idpseudo)
    {
        $this->idpseudo = $idpseudo;

        return $this;
    }

    /**
     * Get idpseudo
     *
     * @return string 
     */
    public function getIdpseudo()
    {
        return $this->idpseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Fb
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
