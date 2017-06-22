<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Joueur
 *
 * @ORM\Entity()
 *
 */
class HistoriqueStats
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
     * @ORM\Column(type="string")
     */
    private $saison;

    /**
     * @var Joueur
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Joueur", inversedBy="historiqueStats")
     */
    private $joueur;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbButs;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbPasses;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbCartonsJaunes;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbCartonsRouges;

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
     * @return HistoriqueStats
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbButs()
    {
        return $this->nbButs;
    }

    /**
     * @param int $nbButs
     * @return HistoriqueStats
     */
    public function setNbButs($nbButs)
    {
        $this->nbButs = $nbButs;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbPasses()
    {
        return $this->nbPasses;
    }

    /**
     * @param int $nbPasses
     * @return HistoriqueStats
     */
    public function setNbPasses($nbPasses)
    {
        $this->nbPasses = $nbPasses;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbCartonsJaunes()
    {
        return $this->nbCartonsJaunes;
    }

    /**
     * @param int $nbCartonsJaunes
     * @return HistoriqueStats
     */
    public function setNbCartonsJaunes($nbCartonsJaunes)
    {
        $this->nbCartonsJaunes = $nbCartonsJaunes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbCartonsRouges()
    {
        return $this->nbCartonsRouges;
    }

    /**
     * @param int $nbCartonsRouges
     * @return HistoriqueStats
     */
    public function setNbCartonsRouges($nbCartonsRouges)
    {
        $this->nbCartonsRouges = $nbCartonsRouges;
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
     * @return HistoriqueStats
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;
        return $this;
    }


}