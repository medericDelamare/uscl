<?php

namespace AppBundle\Entity;

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
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $butsA;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $butsB;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $butsCoupe;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buts;

    /**
     * @var integer
     * @ORM\Column(type="integer",nullable=true)
     */
    private $cartonsJaunes;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cartonsRouges;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $poste;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $passes;

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
}