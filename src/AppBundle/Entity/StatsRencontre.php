<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Rencontre
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RencontreRepository")
 */
class StatsRencontre
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Rencontre", inversedBy="stats")
     * @ORM\JoinColumn(name="rencontre_id", referencedColumnName="id")
     */
    private $rencontre;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Licencie", inversedBy="statsRencontresJoueurs")
     * @ORM\JoinTable(name="joueurs_rencontres")
     */
    private $joueurs;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Licencie", inversedBy="statsRencontresCartonsJaunes")
     * @ORM\JoinTable(name="joueurs_cartons_jaunes")
     */
    private $cartonsJaunes;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Licencie", inversedBy="statsRencontresCartonsRouges")
     * @ORM\JoinTable(name="joueurs_cartons_rouges")
     */
    private $cartonsRouges;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Buteur", mappedBy="statsRencontres")
     */
    private $buteurs;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
        $this->cartonsJaunes = new ArrayCollection();
        $this->cartonsRouges = new ArrayCollection();
        $this->buteurs = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * @param mixed $joueurs
     * @return StatsRencontre
     */
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartonsJaunes()
    {
        return $this->cartonsJaunes;
    }

    /**
     * @param mixed $cartonsJaunes
     * @return StatsRencontre
     */
    public function setCartonsJaunes($cartonsJaunes)
    {
        $this->cartonsJaunes = $cartonsJaunes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartonsRouges()
    {
        return $this->cartonsRouges;
    }

    /**
     * @param mixed $cartonsRouges
     * @return StatsRencontre
     */
    public function setCartonsRouges($cartonsRouges)
    {
        $this->cartonsRouges = $cartonsRouges;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getButeurs()
    {
        return $this->buteurs;
    }

    /**
     * @param ArrayCollection $buteurs
     * @return StatsRencontre
     */
    public function setButeurs($buteurs)
    {
        $this->buteurs = $buteurs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRencontre()
    {
        return $this->rencontre;
    }

    /**
     * @param mixed $rencontre
     * @return StatsRencontre
     */
    public function setRencontre($rencontre)
    {
        $this->rencontre = $rencontre;
        return $this;
    }

    public function addButeur(Buteur $buteur){
        $this->buteurs->add($buteur);
        $buteur->setStatsRencontres($this);
    }
}