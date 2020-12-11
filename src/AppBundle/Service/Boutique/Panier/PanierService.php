<?php


namespace AppBundle\Service\Boutique\Panier;


use AppBundle\Model\Boutique\CaracteristiqueCommandeProduit;
use AppBundle\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use function Couchbase\defaultDecoder;

class PanierService
{
    private $session;
    private $produitRepository;

    public function __construct(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
    }

    public function add($id, CaracteristiqueCommandeProduit $caracteristique)
    {
        $panier = $this->session->get('panier', []);

        $produitExist = false;

        if (empty($panier[$id])){

            $produitExist = true;
            $panier[$id][] = ['taille' => $caracteristique->getTaille(), 'quantite' => $caracteristique->getQuantite(), 'initiales' => $caracteristique->getInitiales()];
        }else{
            foreach ($panier[$id] as $index => $item) {
                if ($item['taille'] == $caracteristique->getTaille() && $item['initiales'] == $caracteristique->getInitiales()) {
                    $item['quantite'] += $caracteristique->getQuantite();
                    $panier[$id][$index] = $item;
                    $produitExist = true;
                }
            }
        }

        if (!$produitExist){
            $panier[$id][] = ['taille' => $caracteristique->getTaille(), 'quantite' => $caracteristique->getQuantite(), 'initiales' => $caracteristique->getInitiales()];
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

        foreach ($panier as $id => $articles) {
            foreach ($articles as $article){
                $panierWithData[] = [
                    'produit' => $this->produitRepository->find($id),
                    'taille' => $article['taille'],
                    'quantite' => $article['quantite'],
                    'initiales' => $article['initiales']
                ];
            }
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