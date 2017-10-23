<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Club
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */

class ClubFifa{
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
    private $championnat;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $pays;

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
    public function getChampionnat()
    {
        return $this->championnat;
    }

    /**
     * @param string $championnat
     * @return ClubFifa
     */
    public function setChampionnat($championnat)
    {
        $this->championnat = $championnat;
        return $this;
    }

    /**
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     * @return ClubFifa
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
        return $this;
    }
}