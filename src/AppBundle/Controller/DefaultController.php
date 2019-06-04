<?php

namespace AppBundle\Controller;

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

        /**
         * @var Rencontre $game
         */
        foreach ($weekGames as $game){
            $categ = $game->getEquipeDomicile()->getCategorie();

            $categoryFormat = ucfirst($categ);
            $categoryFormat = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $categoryFormat);

            $game->getEquipeDomicile()->setCategorie($categoryFormat);
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'weekGames' => $weekGames,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
