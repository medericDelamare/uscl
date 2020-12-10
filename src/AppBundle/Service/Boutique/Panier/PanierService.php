<?php


namespace AppBundle\Service\Boutique\Panier;


use AppBundle\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService
{
    private $session;
    private $produitRepository;

    public function __construct(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
    }

    public function add($id)
    {
        $panier = $this->session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $this->session->set('panier', $panier);
    }

    public function remove($id)
    {
        $panier = $this->session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $this->session->set('panier', $panier);
    }

    public function getFullPanier()
    {
        $panier = $this->session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantite) {
            $panierWithData[] = [
                'produit' => $this->produitRepository->find($id),
                'quantite' => $quantite
            ];
        }

        return $panierWithData;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getFullPanier() as $item) {
            $total += $item['produit']->getPrixCatalogue() * $item['quantite'];;
        }

        return $total;
    }

    public function resetPanier()
    {
        $this->session->set('panier', []);
    }
}