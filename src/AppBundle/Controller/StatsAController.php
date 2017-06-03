<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\DomCrawler\Crawler;

class StatsAController extends Controller
{
    /**
     * @Route("/classement-A", name="classementA")
     * @Template()
     */
    public function showAction(Request $request)
    {
        $club = "http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=328937&ph_no=1&gp_no=1";

        $crawler = new Crawler($club);
        dump($club);

        return $this->render(':default:responsablesCategories.html.twig', [
            'club' => $club
        ]);
    }
}