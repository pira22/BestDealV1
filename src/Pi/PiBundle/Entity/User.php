<?php


namespace Pi\PiBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Annotation;
/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
      * @var string
     * @ORM\Column(name="nom",type="string", length=255)
     */
    protected $nom;
    /**
     * @var string
     * @ORM\Column(name="prenom",type="string", length=255)
     *
     */
    protected $prenom;
    /**
     * @var string
     * @ORM\Column(name="adresse",type="string", length=255)
     * 
     */
    protected $adresse;
    /**
     * @var integer
     * @ORM\Column(name="numtel",type="string", length=255)
     * 
     */
    protected $numtel;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
     /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    
    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
    /**
     * Get numtel
     *
     * @return integer
     */
    public function getNumtel()
    {
        return $this->numtel;
    }
     /**
     * Set numtel
     *
     * @param integer $numtel
     * @return User
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;

        return $this;
    }
}