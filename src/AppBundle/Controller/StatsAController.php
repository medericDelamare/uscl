<?php

namespace AppBundle\Controller;


use GuzzleHttp\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;

class StatsAController extends Controller
{
    /**
     * @Route("/classement-A", name="classementA")
     * @Template()
     */
    public function showAction()
    {

        $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?sa_no=2016&cp_no=328937&ph_no=1&gp_no=1');
        $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=328937&ph_no=1&gp_no=1');

        dump($classement);
        return $this->render(':default:statistiqueA.html.twig', [
            'resultats' => $resultats,
            'classement' => $classement
        ]);
    }

    private function getClassement($html){
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $html);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        $html = curl_exec($ch);

        curl_close($ch);

        $crawler = new Crawler($html);

        $crawler->filter('.tablo');

        $classement = [];

        for ($i = 0; $i < $crawler->filter('.tablo > tr')->count(); $i++) {
            $craw = $crawler->filter('.tablo > tr')->eq($i);
            $place = $craw->filter('td')->eq(0)->text();
            $equipe = $craw->filter('td')->eq(1)->text();
            $points = $craw->filter('td')->eq(2)->text();
            $journees = $craw->filter('td')->eq(3)->text();
            $gagnes = $craw->filter('td')->eq(4)->text();
            $nuls = $craw->filter('td')->eq(5)->text();
            $defaites = $craw->filter('td')->eq(6)->text();
            $forfaits = $craw->filter('td')->eq(7)->text();
            $butsPour = $craw->filter('td')->eq(8)->text();
            $butsContre = $craw->filter('td')->eq(9)->text();
            $penalites = $craw->filter('td')->eq(10)->text();
            $differences = $craw->filter('td')->eq(11)->text();

            $classement[] = [
                'place' => $place,
                'equipe' => $equipe,
                'points' => $points,
                'journées' => $journees,
                'gagnes' => $gagnes,
                'nuls' => $nuls,
                'defaites' => $defaites,
                'forfaits' => $forfaits,
                'butsPour' => $butsPour,
                'butsContre' => $butsContre,
                'penalites' => $penalites,
                'differences' => $differences
            ];
        }

        return $classement;
    }

    private function getResults($html){
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $html);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        $html = curl_exec($ch);

        curl_close($ch);

        $crawler = new Crawler($html);

        $crawler->filter('.resultatmatch');

        $resultats = [];

        for ($i = 0; $i < $crawler->filter('.resultatmatch')->count(); $i++) {
            $craw = $crawler->filter('.resultatmatch')->eq($i);
            $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
            $equipe2 = $craw->filter('.matchLink')->eq(1)->text();
            $score = $craw->filter('.score')->first()->text();
            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'score' => $score
            ];
        }

        return $resultats;
    }
}






