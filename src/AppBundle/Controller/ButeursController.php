<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ButeursController extends Controller
{
    /**
     * @Route("/buteurs", name="buteurs")
     * @Template()
     */
    public function showAction()
    {
        $joueurRepository = $this->getDoctrine()->getManager()->getRepository(Joueur::class);
        $seniors = $joueurRepository->findByCategoryAndByBut('Senior');
        $U18 = $joueurRepository->findByCategoryAndByBut('U18');
        $U15 = $joueurRepository->findByCategoryAndByBut('U15');
        $U13 = $joueurRepository->findByCategoryAndByBut('U13');

        return $this->render(':default:buteurs.html.twig', [
            'seniors' => $seniors,
            'U18' => $U18,
            'U15' => $U15,
            'U13' => $U13
        ]);
    }
}