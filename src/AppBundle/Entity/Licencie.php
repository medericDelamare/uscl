<?php



namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Licencié
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LicencieRepository")
 *
 */
class Licencie
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="bigint", nullable=false, unique=true)
     */
    private $numeroLicence;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $prenom;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $categorie;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $nationalite;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateDeNaissance;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $lieuDeNaissance;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $adresse;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $joueur;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $dirigeant;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $educateur;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephoneDomicile;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephonePortable;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo;

    /**
     * @var CarriereJoueur[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CarriereJoueur", mappedBy="licencie", cascade={"all"})
     * @ORM\OrderBy({"saison" = "DESC"})
     */
    private $carriere;

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\StatsJoueur", inversedBy="licencie", cascade={"all"})
     * @ORM\JoinColumn(name="stats_id", referencedColumnName="id", nullable=true)
     */
    private $stats;


    public function __construct()
    {
        $this->carriere = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    /**
     * @param int $numeroLicence
     * @return Licencie
     */
    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Licencie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Licencie
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     * @return Licencie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     * @return Licencie
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * @param string $dateDeNaissance
     * @return Licencie
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getLieuDeNaissance()
    {
        return $this->lieuDeNaissance;
    }

    /**
     * @param string $lieuDeNaissance
     * @return Licencie
     */
    public function setLieuDeNaissance($lieuDeNaissance)
    {
        $this->lieuDeNaissance = $lieuDeNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     * @return Licencie
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return bool
     */
    public function isJoueur()
    {
        return $this->joueur;
    }

    /**
     * @param bool $joueur
     * @return Licencie
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDirigeant()
    {
        return $this->dirigeant;
    }

    /**
     * @param bool $dirigeant
     * @return Licencie
     */
    public function setDirigeant($dirigeant)
    {
        $this->dirigeant = $dirigeant;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEducateur()
    {
        return $this->educateur;
    }

    /**
     * @param bool $educateur
     * @return Licencie
     */
    public function setEducateur($educateur)
    {
        $this->educateur = $educateur;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephoneDomicile()
    {
        return $this->telephoneDomicile;
    }

    /**
     * @param string $telephoneDomicile
     * @return Licencie
     */
    public function setTelephoneDomicile($telephoneDomicile)
    {
        $this->telephoneDomicile = $telephoneDomicile;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephonePortable()
    {
        return $this->telephonePortable;
    }

    /**
     * @param string $telephonePortable
     * @return Licencie
     */
    public function setTelephonePortable($telephonePortable)
    {
        $this->telephonePortable = $telephonePortable;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Licencie
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return Licencie
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return CarriereJoueur[]
     */
    public function getCarriere()
    {
        return $this->carriere;
    }

    /**
     * @param CarriereJoueur[] $carriere
     * @return Licencie
     */
    public function setCarriere($carriere)
    {
        $this->carriere = $carriere;
        return $this;
    }

    /**
     * @param CarriereJoueur $carriere
     */
    public function addCarriere($carriere){
        if (!$this->carriere->contains($carriere)){
            $this->carriere->add($carriere);
            $carriere->setLicencie($this);
        }
    }

    /**
     * @return mixed
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * @param mixed $stats
     * @return Licencie
     */
    public function setStats($stats)
    {
        $this->stats = $stats;
        return $this;
    }
}