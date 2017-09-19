<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class StatsParJournee
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatsParJourneeRepository")
 *
 */
class StatsParJournee
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
    private $category;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $equipe;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    private $journee;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    private $place;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return StatsParJournee
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @param string $equipe
     * @return StatsParJournee
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
        return $this;
    }

    /**
     * @return string
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * @param string $journee
     * @return StatsParJournee
     */
    public function setJournee($journee)
    {
        $this->journee = $journee;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     * @return StatsParJournee
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }
}