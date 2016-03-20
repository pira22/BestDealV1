<?php

namespace Pi\PiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 *
 * @ORM\Table(name="deal", indexes={@ORM\Index(name="fk_deal_categorie1_idx", columns={"categorie_id"}), @ORM\Index(name="fk_deal_vendeur1_idx", columns={"vendeur_id"})})
 * @ORM\Entity
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
    protected $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    protected $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    protected $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=true)
     */
    protected $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=true)
     */
    protected $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="tauxred", type="integer", nullable=true)
     */
    protected $tauxred;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(name="x", type="float", precision=10, scale=0, nullable=false)
     */
    protected $x;

    /**
     * @var float
     *
     * @ORM\Column(name="y", type="float", precision=10, scale=0, nullable=false)
     */
    protected $y;

    /**
     * @var string
     *
     * @ORM\Column(name="chemin", type="string", length=200, nullable=false)
     */
    protected $chemin;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix1", type="integer", nullable=true)
     */
    protected $prix1;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    protected $categorie;

    /**
     * @var \Vendeur
     *
     * @ORM\ManyToOne(targetEntity="Vendeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendeur_id", referencedColumnName="id")
     * })
     */
    protected $vendeur;

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
     * @param \Pi\PiBundle\Entity\Client $client
     * @return Deal
     */
    public function addClient(\Pi\PiBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Pi\PiBundle\Entity\Client $client
     */
    public function removeClient(\Pi\PiBundle\Entity\Client $client)
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
    public function __sleep() {

    // these are field names to be serialized, others will be excluded
    // but note that you have to fill other field values by your own
    return array('ref', 'nom', 'prix1', 'chemin');
}



}
