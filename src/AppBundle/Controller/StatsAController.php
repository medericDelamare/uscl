<?php

namespace AppBundle\Controller;


use AppBundle\Entity\HistoriqueClassement;
use GuzzleHttp\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;

class StatsAController extends Controller
{
    /**
     * @Route("/statistiques/{category}", name="statistiques")
     * @Template()
     */
    public function showAction($category)
    {
        switch ($category){
            case 'senior-A':
                $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?sa_no=2017&cp_no=339167&ph_no=1&gp_no=1');
                $agenda = $this->getAgenda('http://eure.fff.fr/competitions/php/championnat/championnat_agenda.php?sa_no=2017&cp_no=339167&ph_no=1&gp_no=1');
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2017&cp_no=339167&ph_no=1&gp_no=1');
                $calendrier = $this->getCalendrier('http://eure.fff.fr/competitions/php/championnat/championnat_calendrier_resultat.php?cp_no=339167&ph_no=1&gp_no=1&sa_no=2017&typ_rech=equipe&cl_no=104246&eq_no=1&type_match=deux&lieu_match=deux');
                $categ = 'Senior A';
                break;
            case 'senior-B':
                $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?cp_no=328938&ph_no=1&sa_no=&gp_no=3');
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=328938&ph_no=1&gp_no=3');
                $calendrier = $this->getCalendrier('http://eure.fff.fr/competitions/php/championnat/championnat_calendrier_resultat.php?cp_no=328938&ph_no=1&gp_no=3&sa_no=2016&typ_rech=equipe&cl_no=104246&eq_no=2&type_match=deux&lieu_match=deux');
                $categ = 'Senior B';
                break;
            case 'U18':
                $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?cp_no=329044&ph_no=2&sa_no=&gp_no=2');
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=329044&ph_no=2&gp_no=2');
                $calendrier = $this->getCalendrier('http://eure.fff.fr/competitions/php/championnat/championnat_calendrier_resultat.php?cp_no=329044&ph_no=2&gp_no=2&sa_no=2016&typ_rech=equipe&cl_no=104246&eq_no=4&type_match=deux&lieu_match=deux');
                $categ = $category;
                break;
            case 'U15':
                $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?cp_no=329047&ph_no=2&sa_no=&gp_no=2');
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=329047&ph_no=2&gp_no=2');
                $calendrier = $this->getCalendrier('http://eure.fff.fr/competitions/php/championnat/championnat_calendrier_resultat.php?cp_no=329047&ph_no=2&gp_no=2&sa_no=2016&typ_rech=equipe&cl_no=104246&eq_no=5&type_match=deux&lieu_match=deux');
                $categ = $category;
                break;
            case 'U13':
                $resultats = $this->getResults('http://eure.fff.fr/competitions/php/championnat/championnat_resultat.php?cp_no=329051&ph_no=2&sa_no=&gp_no=2');
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=329051&ph_no=2&gp_no=2');
                $calendrier = $this->getCalendrier('http://eure.fff.fr/competitions/php/championnat/championnat_calendrier_resultat.php?cp_no=329051&ph_no=2&gp_no=2&sa_no=2016&typ_rech=equipe&cl_no=104246&eq_no=7&type_match=deux&lieu_match=deux');
                $categ = $category;
                break;
        }

        $historiques = $this->getDoctrine()->getManager()->getRepository(HistoriqueClassement::class)->findAll();
        foreach ($historiques as $historique){
            $annees[] = $historique->getAnnee();
            $points[] = $historique->getNbPoints();
            $positions[] = $historique->getPosition();
        }


        return $this->render(':default:statistiques.html.twig', [
            'agendas' => $agenda,
            'resultats' => $resultats,
            'classement' => $classement,
            'calendrier' => $calendrier,
            'categorie' => $categ,
            'annees' => $annees,
            'points' => $points,
            'positions' => $positions
        ]);
    }

    private function getAgenda($html){
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

        $refpop = $crawler->filter('#refpop');
        $date = $refpop->filter('h3')->first()->text();

        for ($i = 0; $i < $crawler->filter('.resultatmatch')->count(); $i++) {
            $craw = $crawler->filter('.resultatmatch')->eq($i);

            if ($craw->filter('.matchLink')->count() == 2){
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = $craw->filter('.matchLink')->eq(1)->text();
            } else{
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = 'Exempt';
            }
            $score = $craw->filter('.score')->first()->text();

            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'score' => $score,
                'date' => $date,
            ];
        }

        return $resultats;
    }

    private function getCalendrier($html){
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
            if ($craw->filter('.matchLink')->count() == 2){
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = $craw->filter('.matchLink')->eq(1)->text();
            } else{
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = 'Exempt';
            }
            $score = $craw->filter('.score')->first()->text();
            $date = $this->convertDate($craw->filter('.dat')->first()->text());
            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'score' => $score,
                'date' => $date
            ];
        }

        return $resultats;
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

            if ($craw->filter('.matchLink')->count() == 2){
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = $craw->filter('.matchLink')->eq(1)->text();
            } else{
                $equipe1 = $craw->filter('.matchLink')->eq(0)->text();
                $equipe2 = 'Exempt';
            }

            $score = $craw->filter('.score')->first()->text();
            $date = $craw->filter('.dat')->first()->text();
            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'score' => $score,
                'date' => $date
            ];
        }

        return $resultats;
    }

    public function convertDate($date){
        $dateRegex = preg_replace('(\s+)', ' ', $date);
        $dateSplit = explode(' ',$dateRegex);

        switch (strtolower($dateSplit[2])){
            case 'janvier':
                $dateSplit[2] = "01";
                break;
            case 'fevrier':
            case 'février':
                $dateSplit[2] = "02";
                break;
            case 'mars':
                $dateSplit[2] = "03";
                break;
            case 'avril':
                $dateSplit[2] = "04";
                break;
            case 'mai':
                $dateSplit[2] = "05";
                break;
            case 'juin':
                $dateSplit[2] = "06";
                break;
            case 'jullet':
                $dateSplit[2] = "07";
                break;
            case 'aout':
            case 'août':
                $dateSplit[2] = "08";
                break;
            case 'septembre':
                $dateSplit[2] = "09";
                break;
            case 'octobre':
                $dateSplit[2] = "10";
                break;
            case 'novembre':
                $dateSplit[2] = "11";
                break;
            case 'decembre':
            case 'décembre':
                $dateSplit[2] = "12";
                break;
        }
        return $dateSplit[1] . "/" . $dateSplit[2] . "/" . $dateSplit[3];
    }
}






