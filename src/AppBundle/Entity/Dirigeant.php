<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Dirigeant
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class Dirigeant
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
    private $prenom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $fixe;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $mobile;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $mail;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $photo;

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Dirigeant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
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
     * @return Dirigeant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getFixe()
    {
        return $this->fixe;
    }

    /**
     * @param string $fixe
     * @return Dirigeant
     */
    public function setFixe($fixe)
    {
        $this->fixe = $fixe;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return Dirigeant
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Dirigeant
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return Dirigeant
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    public function __toString()
    {
        return $this->getPrenom() . $this->getNom();
    }
}