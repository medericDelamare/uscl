<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Joueur
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 *
 */
class Joueur
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var Categorie
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $butsA = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $butsB = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $butsCoupe = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buts = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $cartonsJaunes = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cartonsRouges = 0;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poste")
     * @ORM\JoinColumn(nullable=true)
     */
    private $poste;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $passes = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchs = 0;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $lieuNaissance;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $ville;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $mobile;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $numeroLicence;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $mail;

    /**
     * @var CarriereJoueur[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CarriereJoueur", mappedBy="joueur")
     * @ORM\OrderBy({"saison" = "DESC"})
     */
    private $carriere;

    /**
     * @var HistoriqueStats[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HistoriqueStats", mappedBy="joueur")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $historiqueStats;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo;

    public function __construct()
    {
        $this->carriere = new ArrayCollection();
        $this->historiqueStats= new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Joueur
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Joueur
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
     * @return Joueur
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
     * @return Joueur
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * @return int
     */
    public function getButsA()
    {
        return $this->butsA;
    }

    /**
     * @param int $butsA
     * @return Joueur
     */
    public function setButsA($butsA)
    {
        $this->butsA = $butsA;
        return $this;
    }

    /**
     * @return int
     */
    public function getButsB()
    {
        return $this->butsB;
    }

    /**
     * @param int $butsB
     * @return Joueur
     */
    public function setButsB($butsB)
    {
        $this->butsB = $butsB;
        return $this;
    }

    /**
     * @return int
     */
    public function getButsCoupe()
    {
        return $this->butsCoupe;
    }

    /**
     * @param int $butsCoupe
     * @return Joueur
     */
    public function setButsCoupe($butsCoupe)
    {
        $this->butsCoupe = $butsCoupe;
        return $this;
    }

    /**
     * @return int
     */
    public function getButs()
    {
        return $this->buts;
    }

    /**
     * @param int $buts
     * @return Joueur
     */
    public function setButs($buts)
    {
        $this->buts = $buts;
        return $this;
    }

    /**
     * @return int
     */
    public function getCartonsJaunes()
    {
        return $this->cartonsJaunes;
    }

    /**
     * @param int $cartonsJaunes
     * @return Joueur
     */
    public function setCartonsJaunes($cartonsJaunes)
    {
        $this->cartonsJaunes = $cartonsJaunes;
        return $this;
    }

    /**
     * @return int
     */
    public function getCartonsRouges()
    {
        return $this->cartonsRouges;
    }

    /**
     * @param int $cartonsRouges
     * @return Joueur
     */
    public function setCartonsRouges($cartonsRouges)
    {
        $this->cartonsRouges = $cartonsRouges;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param string $poste
     * @return Joueur
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
        return $this;
    }

    /**
     * @return int
     */
    public function getPasses()
    {
        return $this->passes;
    }

    /**
     * @param int $passes
     * @return Joueur
     */
    public function setPasses($passes)
    {
        $this->passes = $passes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbMatchs()
    {
        return $this->nbMatchs;
    }

    /**
     * @param int $nbMatchs
     * @return Joueur
     */
    public function setNbMatchs($nbMatchs)
    {
        $this->nbMatchs = $nbMatchs;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param \DateTime $dateNaissance
     * @return Joueur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * @param string $lieuNaissance
     * @return Joueur
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     * @return Joueur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     * @return Joueur
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return Joueur
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    /**
     * @param string $numeroLicence
     * @return Joueur
     */
    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Joueur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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
     * @return Joueur
     */
    public function setCarriere($carriere)
    {
        $this->carriere = $carriere;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Joueur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return HistoriqueStats[]
     */
    public function getHistoriqueStats()
    {
        return $this->historiqueStats;
    }

    /**
     * @param HistoriqueStats[] $historiqueStats
     * @return Joueur
     */
    public function setHistoriqueStats($historiqueStats)
    {
        $this->historiqueStats = $historiqueStats;
        return $this;
    }

    public function __toString()
    {
        return $this->nom . ' ' . $this->prenom;
    }
}