<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EffectifController
 * @package AppBundle\Controller
 *
 */
class EffectifController extends Controller
{
    /**
     * @Route("/effectif/{category}", name="effectif")
     * @Template()
     */
    public function listByCategoryAction($category)
    {

        $em = $this->getDoctrine()->getManager();
        $gardiens = $em->getRepository(Joueur::class)->findByCategoryAndPost($category, 'gardien');
        $defenseurs = $em->getRepository(Joueur::class)->findByCategoryAndPost($category, 'defenseur');
        $milieux = $em->getRepository(Joueur::class)->findByCategoryAndPost($category, 'milieu');
        $attaquants = $em->getRepository(Joueur::class)->findByCategoryAndPost($category, 'attaquant');
        $nbJoueurs = count($gardiens) + count($defenseurs) + count($milieux) + count($attaquants);
        return $this->render('default/effectif.html.twig', [
            'gardiens' => $gardiens,
            'defenseurs' => $defenseurs,
            'milieux' => $milieux,
            'attaquants' => $attaquants,
            'category' => $category,
            'nb_joueurs' => $nbJoueurs
        ]);

    }
}