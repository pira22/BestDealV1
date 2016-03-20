<?php

namespace Pi\PiAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Deal
 *
 * @ORM\Table(name="deal", indexes={@ORM\Index(name="fk_deal_categorie1_idx", columns={"categorie_id"}), @ORM\Index(name="fk_deal_vendeur1_idx", columns={"vendeur_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Deal
{
   
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="tauxred", type="integer", nullable=true)
     */
    private $tauxred;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="x", type="float", precision=10, scale=0, nullable=false)
     */
    private $x;

    /**
     * @var float
     *
     * @ORM\Column(name="y", type="float", precision=10, scale=0, nullable=false)
     */
    private $y;

    /**
     * @var string
     *
     * @ORM\Column(name="chemin", type="string", length=200, nullable=false)
     */
    private $chemin;
    
    
    /**
     * @Assert\File(
     * maxSize="5M",
     * mimeTypes={"image/png", "image/jpeg", "image/gif"}
     * )
     */
    public $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix1", type="integer", nullable=true)
     */
    private $prix1;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorie;

    /**
     * @var \Vendeur
     *
     * @ORM\ManyToOne(targetEntity="Vendeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendeur_id", referencedColumnName="id")
     * })
     */
    private $vendeur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="dealRef")
     */
    private $client;
   

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get ref
     *
     * @return integer 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Deal
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
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
     * Set quantite
     *
     * @param integer $quantite
     * @return Deal
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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Deal
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Deal
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set tauxred
     *
     * @param integer $tauxred
     * @return Deal
     */
    public function setTauxred($tauxred)
    {
        $this->tauxred = $tauxred;

        return $this;
    }

    /**
     * Get tauxred
     *
     * @return integer 
     */
    public function getTauxred()
    {
        return $this->tauxred;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Deal
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set x
     *
     * @param float $x
     * @return Deal
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return float 
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param float $y
     * @return Deal
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return float 
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set chemin
     *
     * @param string $chemin
     * @return Deal
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;

        return $this;
    }

    /**
     * Get chemin
     *
     * @return string 
     */
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * Set prix1
     *
     * @param integer $prix1
     * @return Deal
     */
    public function setPrix1($prix1)
    {
        $this->prix1 = $prix1;

        return $this;
    }

    /**
     * Get prix1
     *
     * @return integer 
     */
    public function getPrix1()
    {
        return $this->prix1;
    }

    /**
     * Set categorie
     *
     * @param \Pi\PiAdminBundle\Entity\Categorie $categorie
     * @return Deal
     */
    public function setCategorie(\Pi\PiAdminBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Pi\PiAdminBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set vendeur
     *
     * @param \Pi\PiAdminBundle\Entity\Vendeur $vendeur
     * @return Deal
     */
    public function setVendeur(\Pi\PiAdminBundle\Entity\Vendeur $vendeur = null)
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * Get vendeur
     *
     * @return \Pi\PiAdminBundle\Entity\Vendeur 
     */
    public function getVendeur()
    {
        return $this->vendeur;
    }

    /**
     * Add client
     *
     * @param \Pi\PiAdminBundle\Entity\Client $client
     * @return Deal
     */
    public function addClient(\Pi\PiAdminBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Pi\PiAdminBundle\Entity\Client $client
     */
    public function removeClient(\Pi\PiAdminBundle\Entity\Client $client)
    {
        $this->client->removeElement($client);
    }

    /**
     * Get client
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClient()
    {
        return $this->client;
    }
   
    
    public function __toString() {
       return $this->nom; 
    }
    
     public function getFullImagePath()
    {
        return null === $this->chemin ? null : $this->getUploadRootDir().$this->chemin;
    }
  
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir().$this->getId()."/";
    }
  
    protected function getTmpUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/';
    }
 
 
   /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadImage()
    {
        if (null !== $this->file) {
            $this->chemin = 'image.' .$this->file->guessExtension();
        }
    }
 
 
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadImage()
    {
        if (null === $this->file) {
            return;
        }
 
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
        }
 
        $this->file->move($this->getUploadRootDir(), $this->chemin);
        var_dump($this->chemin);
        unset($this->file);
    }
 
    
    
    /**
     * @ORM\PostRemove()
     */
    public function removeImage()
    {
        unlink($this->getFullImagePath());
        rmdir($this->getUploadRootDir());
    }
   
}
