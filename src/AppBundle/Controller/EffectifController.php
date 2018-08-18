<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
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
        $joueurs = $em->getRepository(Licencie::class)->findByCategoryOrderByPoste($category);
        return $this->render('default/effectif.html.twig', [
            'joueurs' => $joueurs,
            'category' => $category,
            'nb_joueurs' => count($joueurs)
        ]);

    }
}