<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProfileController
 * @package AppBundle\Controller
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile/{id}", name="profile")
     * @Template()
     */
    public function profileShowAction($id){
        $joueur = $this->getDoctrine()->getManager()->getRepository(Joueur::class)->find($id);

        $saisons = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $saisons[] = $historiqueStat->getSaison();
        }
        array_unshift($saisons, '17/18');

        $buts = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $buts[] = $historiqueStat->getNbButs();
        }
        array_unshift($buts, $joueur->getButs());

        $passes = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $passes[] = $historiqueStat->getNbPasses();
        }
        array_unshift($passes, $joueur->getPasses());

        $cartonsJ = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat) {
            $cartonsJ[] = $historiqueStat->getNbCartonsJaunes();
        }
        array_unshift($cartonsJ, $joueur->getCartonsJaunes());

        $cartonsR = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $cartonsR[] = $historiqueStat->getNbCartonsRouges();
        }
        array_unshift($cartonsR, $joueur->getCartonsRouges());

        return $this->render(':default:profil.html.twig', [
            'joueur' => $joueur,
            'saisons' => $saisons,
            'cartonsJ' => $cartonsJ,
            'cartonsR' => $cartonsR,
            'buts' => $buts,
            'passes' => $passes
        ]);
    }
}