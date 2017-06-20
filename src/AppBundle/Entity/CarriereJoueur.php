<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
/**
 * Class Joueur
 *
 * @ORM\Entity()
 *
 */
class CarriereJoueur
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Joueur
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Joueur", inversedBy="carriere")
     */
    private $joueur;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $saison;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $sousCategorie;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $club;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Joueur
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * @param Joueur $joueur
     * @return CarriereJoueur
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * @param string $saison
     * @return CarriereJoueur
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;
        return $this;
    }

    /**
     * @return string
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }

    /**
     * @param string $sousCategorie
     * @return CarriereJoueur
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;
        return $this;
    }

    /**
     * @return string
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param string $club
     * @return CarriereJoueur
     */
    public function setClub($club)
    {
        $this->club = $club;
        return $this;
    }
}