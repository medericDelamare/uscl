<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Buteur
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RencontreRepository")
 */
class Buteur
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var StatsRencontre
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StatsRencontre", inversedBy="buteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statsRencontres;

    /**
     * @var Licencie
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Licencie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $buteur;

    /**
     * @var Licencie
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Licencie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $passeur;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return StatsRencontre
     */
    public function getStatsRencontres()
    {
        return $this->statsRencontres;
    }

    /**
     * @param StatsRencontre $statsRencontres
     * @return Buteur
     */
    public function setStatsRencontres($statsRencontres)
    {
        $this->statsRencontres = $statsRencontres;
        return $this;
    }

    /**
     * @return Licencie
     */
    public function getButeur()
    {
        return $this->buteur;
    }

    /**
     * @param Licencie $buteur
     * @return Buteur
     */
    public function setButeur($buteur)
    {
        $this->buteur = $buteur;
        return $this;
    }

    /**
     * @return Licencie
     */
    public function getPasseur()
    {
        return $this->passeur;
    }

    /**
     * @param Licencie $passeur
     * @return Buteur
     */
    public function setPasseur($passeur)
    {
        $this->passeur = $passeur;
        return $this;
    }
}