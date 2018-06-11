<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class StatsEquipe
{
    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $journees;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $victoires;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nuls;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $defaites;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $forfaits;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $butsPour;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $butsContre;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $penalites;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $difference;

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param int $points
     * @return StatsEquipe
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * @return int
     */
    public function getJournees()
    {
        return $this->journees;
    }

    /**
     * @param int $journees
     * @return StatsEquipe
     */
    public function setJournees($journees)
    {
        $this->journees = $journees;
        return $this;
    }

    /**
     * @return int
     */
    public function getVictoires()
    {
        return $this->victoires;
    }

    /**
     * @param int $victoires
     * @return StatsEquipe
     */
    public function setVictoires($victoires)
    {
        $this->victoires = $victoires;
        return $this;
    }

    /**
     * @return int
     */
    public function getNuls()
    {
        return $this->nuls;
    }

    /**
     * @param int $nuls
     * @return StatsEquipe
     */
    public function setNuls($nuls)
    {
        $this->nuls = $nuls;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaites()
    {
        return $this->defaites;
    }

    /**
     * @param int $defaites
     * @return StatsEquipe
     */
    public function setDefaites($defaites)
    {
        $this->defaites = $defaites;
        return $this;
    }

    /**
     * @return int
     */
    public function getForfaits()
    {
        return $this->forfaits;
    }

    /**
     * @param int $forfaits
     * @return StatsEquipe
     */
    public function setForfaits($forfaits)
    {
        $this->forfaits = $forfaits;
        return $this;
    }

    /**
     * @return int
     */
    public function getButsPour()
    {
        return $this->butsPour;
    }

    /**
     * @param int $butsPour
     * @return StatsEquipe
     */
    public function setButsPour($butsPour)
    {
        $this->butsPour = $butsPour;
        return $this;
    }

    /**
     * @return int
     */
    public function getButsContre()
    {
        return $this->butsContre;
    }

    /**
     * @param int $butsContre
     * @return StatsEquipe
     */
    public function setButsContre($butsContre)
    {
        $this->butsContre = $butsContre;
        return $this;
    }

    /**
     * @return int
     */
    public function getPenalites()
    {
        return $this->penalites;
    }

    /**
     * @param int $penalites
     * @return StatsEquipe
     */
    public function setPenalites($penalites)
    {
        $this->penalites = $penalites;
        return $this;
    }

    /**
     * @return int
     */
    public function getDifference()
    {
        return $this->difference;
    }

    /**
     * @param int $difference
     * @return StatsEquipe
     */
    public function setDifference($difference)
    {
        $this->difference = $difference;
        return $this;
    }
}