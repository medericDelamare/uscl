<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarriereJoueur;
use AppBundle\Entity\NombreLicenciesParAnnee;
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
        $statsLicencies = $this->getDoctrine()->getRepository(NombreLicenciesParAnnee::class)->getAllOrderByAnneeDebut();

        /**
         * @var Rencontre $game
         */
        foreach ($weekGames as $game){
            $categ = $game->getEquipeDomicile()->getCategorie();

            $categoryFormat = ucfirst($categ);
            $categoryFormat = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $categoryFormat);

            $game->getEquipeDomicile()->setCategorie($categoryFormat);
        }

        $annees = [];
        $nbLicencies = [];
        /**
         * @var NombreLicenciesParAnnee $stat
         */
        foreach ($statsLicencies as $stat){
            $annees[] = $stat->getAnneeDepart() . '/' . $stat->getAnneeFin();
            $nbLicencies[] = $stat->getNombreLicencies();
        }

        $annees[] = $this->container->getParameter('debut_annee') . '/' . $this->container->getParameter('fin_annee');
        $nbLicencies[] = $nombreLicenceActuel;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'weekGames' => $weekGames,
            'annees' => $annees,
            'nbLicencies' => $nbLicencies,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
