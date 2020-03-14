<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarriereJoueur;
use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;
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
        $saisonEnCours = $this->getParameter('debut_annee') . '-' .$this->getParameter('fin_annee');
        $em = $this->getDoctrine()->getManager();
        if ($category == 'Football-animation'){
            $u7 = $em->getRepository(CarriereJoueur::class)->findLicencieByCategoryAndsaison('U7',$saisonEnCours);
            $u9 = $em->getRepository(CarriereJoueur::class)->findLicencieByCategoryAndsaison('U9',$saisonEnCours);
            $u11 = $em->getRepository(CarriereJoueur::class)->findLicencieByCategoryAndsaison('U11',$saisonEnCours);

            $joueurs = [
                'u7' => $u7,
                'u9' => $u9,
                'u11' => $u11
            ];
            return $this->render('effectif-football-animation.html.twig', [
                'u7' => $u7,
                'u9' => $u9,
                'u11' => $u11,
                'category' => $category,
            ]);
        } else{
            $gardiens = $em->getRepository(CarriereJoueur::class)->findLicencieBySaisonAndCategorie($category,$saisonEnCours,1);
            $defenseurs = $em->getRepository(CarriereJoueur::class)->findLicencieBySaisonAndCategorie($category,$saisonEnCours,2);
            $mileux = $em->getRepository(CarriereJoueur::class)->findLicencieBySaisonAndCategorie($category,$saisonEnCours,3);
            $attaquants = $em->getRepository(CarriereJoueur::class)->findLicencieBySaisonAndCategorie($category,$saisonEnCours,4);
            return $this->render('default/effectif.html.twig', [
                'gardiens' => $gardiens,
                'defenseurs' => $defenseurs,
                'milieux' => $mileux,
                'attaquants' => $attaquants,
                'category' => $category,
                'nb_joueurs' => count(array_merge($gardiens,$defenseurs,$mileux,$attaquants))
            ]);
        }




    }
}