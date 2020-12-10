<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends Controller
{
    /**
     * @Route("/panier", name="panier")
     * @Template()
     */
    public function index(SessionInterface $session)
    {
        $panierService = $this->get('app.boutique.panier.panier_service');
        return $this->render('default/panier.html.twig', [
            'items' => $panierService->getFullPanier(),
            'total' => $panierService->getTotal(),
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function add($id)
    {
        $panierService = $this->get('app.boutique.panier.panier_service');
        $panierService->add($id);
        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     */
    public function remove($id)
    {
        $panierService = $this->get('app.boutique.panier.panier_service');
        $panierService->remove($id);
        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/reset", name="panier_reset")
     */
    public function reset(){
        $panierService = $this->get('app.boutique.panier.panier_service');
        $panierService->resetPanier();
        return $this->redirectToRoute('panier');
    }
}