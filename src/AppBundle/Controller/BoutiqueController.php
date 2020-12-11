<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boutique\Produit;
use AppBundle\Form\ProduitType;
use AppBundle\Model\Boutique\CaracteristiqueCommandeProduit;
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
     * @Route("/produit/{produit}", name="boutique_produit")
     * @Template()
     */
    public function showAction(Request $request, Produit $produit)
    {
        $panierService = $this->get('app.boutique.panier.panier_service');
        $caracteristique = new CaracteristiqueCommandeProduit();
        $form = $this->createForm(ProduitType::class, $caracteristique, [
            'action' => $this->generateUrl('boutique_produit', ['produit' => $produit->getId()]),
            'method' => 'POST'
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $caracteristique = $form->getData();
                $panierService->add($produit->getId(),$caracteristique);
                return $this->redirectToRoute('panier');
            }
        }
        return $this->render('default/produit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView()
        ]);
    }
}