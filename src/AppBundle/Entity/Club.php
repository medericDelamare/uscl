<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Club
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class Club
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
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $logo;

    /**
     * @var ArrayCollection
     * @ORM\Column(type="array")
     */
    private $nomsParse;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Club
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Club
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getNomsParse()
    {
        return $this->nomsParse;
    }

    /**
     * @param ArrayCollection $nomsParse
     * @return Club
     */
    public function setNomsParse($nomsParse)
    {
        $this->nomsParse = $nomsParse;
        return $this;
    }
}