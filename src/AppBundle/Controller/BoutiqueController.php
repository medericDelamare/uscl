<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class BoutiqueController extends  Controller
{
    /**
     * @Route("/boutique/liste", name="boutique-liste")
     * @Template()
     */
    public function showAction()
    {
        return $this->render(':default:boutique.html.twig', [
        ]);
    }
}