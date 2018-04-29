<?php
/**
 * Created by PhpStorm.
 * User: delamare
 * Date: 28/04/2018
 * Time: 11:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Categorie
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class Categorie
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
     * @ORM\Column(type="string",unique=true)
     */
    private $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }


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
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }
}