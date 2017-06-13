<?php

namespace AppBundle\Entity;

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
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $president;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $vicePresident1;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $vicePresident2;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $vicePresident3;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $secretaire;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $tresorier;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableJeunes;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableSeniors;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableA;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableB;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU18;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU15;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU13;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU11;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU9;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableU7;

    /**
     * @var Dirigeant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dirigeant")
     */
    private $responsableFutsal;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Dirigeant
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * @param Dirigeant $president
     * @return Club
     */
    public function setPresident($president)
    {
        $this->president = $president;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getVicePresident1()
    {
        return $this->vicePresident1;
    }

    /**
     * @param Dirigeant $vicePresident1
     * @return Club
     */
    public function setVicePresident1($vicePresident1)
    {
        $this->vicePresident1 = $vicePresident1;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getVicePresident2()
    {
        return $this->vicePresident2;
    }

    /**
     * @param Dirigeant $vicePresident2
     * @return Club
     */
    public function setVicePresident2($vicePresident2)
    {
        $this->vicePresident2 = $vicePresident2;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getVicePresident3()
    {
        return $this->vicePresident3;
    }

    /**
     * @param Dirigeant $vicePresident3
     * @return Club
     */
    public function setVicePresident3($vicePresident3)
    {
        $this->vicePresident3 = $vicePresident3;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getSecretaire()
    {
        return $this->secretaire;
    }

    /**
     * @param Dirigeant $secretaire
     * @return Club
     */
    public function setSecretaire($secretaire)
    {
        $this->secretaire = $secretaire;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getTresorier()
    {
        return $this->tresorier;
    }

    /**
     * @param Dirigeant $tresorier
     * @return Club
     */
    public function setTresorier($tresorier)
    {
        $this->tresorier = $tresorier;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableJeunes()
    {
        return $this->responsableJeunes;
    }

    /**
     * @param Dirigeant $responsableJeunes
     * @return Club
     */
    public function setResponsableJeunes($responsableJeunes)
    {
        $this->responsableJeunes = $responsableJeunes;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableSeniors()
    {
        return $this->responsableSeniors;
    }

    /**
     * @param Dirigeant $responsableSeniors
     * @return Club
     */
    public function setResponsableSeniors($responsableSeniors)
    {
        $this->responsableSeniors = $responsableSeniors;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableA()
    {
        return $this->responsableA;
    }

    /**
     * @param Dirigeant $responsableA
     * @return Club
     */
    public function setResponsableA($responsableA)
    {
        $this->responsableA = $responsableA;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableB()
    {
        return $this->responsableB;
    }

    /**
     * @param Dirigeant $responsableB
     * @return Club
     */
    public function setResponsableB($responsableB)
    {
        $this->responsableB = $responsableB;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU18()
    {
        return $this->responsableU18;
    }

    /**
     * @param Dirigeant $responsableU18
     * @return Club
     */
    public function setResponsableU18($responsableU18)
    {
        $this->responsableU18 = $responsableU18;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU15()
    {
        return $this->responsableU15;
    }

    /**
     * @param Dirigeant $responsableU15
     * @return Club
     */
    public function setResponsableU15($responsableU15)
    {
        $this->responsableU15 = $responsableU15;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU13()
    {
        return $this->responsableU13;
    }

    /**
     * @param Dirigeant $responsableU13
     * @return Club
     */
    public function setResponsableU13($responsableU13)
    {
        $this->responsableU13 = $responsableU13;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU11()
    {
        return $this->responsableU11;
    }

    /**
     * @param Dirigeant $responsableU11
     * @return Club
     */
    public function setResponsableU11($responsableU11)
    {
        $this->responsableU11 = $responsableU11;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU9()
    {
        return $this->responsableU9;
    }

    /**
     * @param Dirigeant $responsableU9
     * @return Club
     */
    public function setResponsableU9($responsableU9)
    {
        $this->responsableU9 = $responsableU9;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableU7()
    {
        return $this->responsableU7;
    }

    /**
     * @param Dirigeant $responsableU7
     * @return Club
     */
    public function setResponsableU7($responsableU7)
    {
        $this->responsableU7 = $responsableU7;
        return $this;
    }

    /**
     * @return Dirigeant
     */
    public function getResponsableFutsal()
    {
        return $this->responsableFutsal;
    }

    /**
     * @param Dirigeant $responsableFutsal
     * @return Club
     */
    public function setResponsableFutsal($responsableFutsal)
    {
        $this->responsableFutsal = $responsableFutsal;
        return $this;
    }
}