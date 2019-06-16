<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarriereJoueur;
use AppBundle\Entity\Rencontre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $weekGames = $this->getDoctrine()->getRepository(Rencontre::class)->getWeekGames();
        $nombreLicenceActuel = $this->getDoctrine()->getRepository(CarriereJoueur::class)->nbLicencie();

        /**
         * @var Rencontre $game
         */
        foreach ($weekGames as $game){
            $categ = $game->getEquipeDomicile()->getCategorie();

            $categoryFormat = ucfirst($categ);
            $categoryFormat = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $categoryFormat);

            $game->getEquipeDomicile()->setCategorie($categoryFormat);
        }

        $anneeEnCours = substr($this->container->getParameter('debut_annee'),2) . '/' . substr($this->container->getParameter('fin_annee'),2);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'weekGames' => $weekGames,
            'nbLicencieActuel' => $nombreLicenceActuel,
            'anneeEnCours' => $anneeEnCours,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
