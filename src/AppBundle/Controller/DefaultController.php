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
        $saison = $anneDebutSaison = $this->getParameter('debut_annee') .'-' .$anneDebutSaison = $this->getParameter('fin_annee');
        $weekGames = $this->getDoctrine()->getRepository(Rencontre::class)->getWeekGames();
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

        return $this->render('default/index.html.twig', [
            'weekGames' => $weekGames,
            'annees' => $annees,
            'nbLicencies' => $nbLicencies,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
