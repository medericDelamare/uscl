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

        return $this->render(':default:profil.html.twig', [
            'joueur' => $joueur
        ]);
    }
}