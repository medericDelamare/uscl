<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boutique\Produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends Controller
{
    /**
     * @Route("/boutique", name="boutique")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();

        return $this->render('default/boutique.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/produit/{produit}", name="boutique-produit")
     * @Template()
     */
    public function showAction(Request $request, Produit $produit){
        return $this->render('default/produit.html.twig', [
            'produit' => $produit
        ]);
    }
}