<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Xmon\ColorPickerTypeBundle\Validator\Constraints as XmonAssertColor;
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
     * @var NomParse[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\NomParse", mappedBy="club")
     */
    private $nomsParse;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @XmonAssertColor\HexColor()
     */
    private $couleurPrincipale;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $couleurSecondaire;

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
     * @return NomParse[]
     */
    public function getNomsParse()
    {
        return $this->nomsParse;
    }

    /**
     * @param NomParse[] $nomsParse
     * @return Club
     */
    public function setNomsParse($nomsParse)
    {
        $this->nomsParse = $nomsParse;
        return $this;
    }

    /**
     * @return string
     */
    public function getCouleurPrincipale()
    {
        return $this->couleurPrincipale;
    }

    /**
     * @param string $couleurPrincipale
     * @return Club
     */
    public function setCouleurPrincipale($couleurPrincipale)
    {
        $this->couleurPrincipale = $couleurPrincipale;
        return $this;
    }

    /**
     * @return string
     */
    public function getCouleurSecondaire()
    {
        return $this->couleurSecondaire;
    }

    /**
     * @param string $couleurSecondaire
     * @return Club
     */
    public function setCouleurSecondaire($couleurSecondaire)
    {
        $this->couleurSecondaire = $couleurSecondaire;
        return $this;
    }

    public function __toString()
    {
        return $this->getNom() ? $this->getNom() : '';
    }
}