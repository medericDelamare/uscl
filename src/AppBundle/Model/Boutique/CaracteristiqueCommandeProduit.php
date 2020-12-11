<?php


namespace AppBundle\Model\Boutique;


class CaracteristiqueCommandeProduit
{
    private $taille;
    private $quantite;
    private $initiales;

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @param mixed $taille
     * @return CaracteristiqueCommandeProduit
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     * @return CaracteristiqueCommandeProduit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitiales()
    {
        return $this->initiales;
    }

    /**
     * @param mixed $initiales
     * @return CaracteristiqueCommandeProduit
     */
    public function setInitiales($initiales)
    {
        $this->initiales = $initiales;
        return $this;
    }
}