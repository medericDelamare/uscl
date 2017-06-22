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

        $buts = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $buts[] = $historiqueStat->getNbButs();
        }

        $passes = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $passes[] = $historiqueStat->getNbPasses();
        }

        $cartonsJ = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat) {
            $cartonsJ[] = $historiqueStat->getNbCartonsJaunes();
        }

        $cartonsR = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $cartonsR[] = $historiqueStat->getNbCartonsRouges();
        }

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