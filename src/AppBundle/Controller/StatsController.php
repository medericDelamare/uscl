<?php

namespace AppBundle\Controller;


use AppBundle\Entity\HistoriqueClassement;
use AppBundle\Entity\StatsParJournee;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;

class StatsController extends Controller
{
    /**
     * @Route("/statistiques/{category}", name="statistiques")
     * @Template()
     */
    public function showAction($category)
    {
        switch ($category){
            case 'senior-A':
                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=resultat');
                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=agenda');
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=ranking');
                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-1&opposant=&place=&sens=&id=339167&poule=1&phase=1&tab=advanced_search&type=ch');
                $categ = 'Senior A';
                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('Senior-A');
                break;
            case 'senior-B':
                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=resultat');
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=ranking');
                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-2&opposant=&place=&sens=&id=339168&poule=3&phase=1&tab=advanced_search&type=ch');
                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=agenda');
                $categ = 'Senior B';
                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('Senior-B');
                break;
            case 'U18':
                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=resultat');
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=ranking');
                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-4&opposant=&place=&sens=&id=339172&poule=1&phase=1&tab=advanced_search&type=ch');
                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=agenda');
                $categ = $category;
                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U18');
                break;
            case 'U15':
                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=resultat');
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=ranking');
                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=agenda');
                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-5&opposant=&place=&sens=&id=339174&poule=1&phase=1&tab=advanced_search&type=ch');
                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U15');
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

        $classementTriParEquipe = [];
        /** @var StatsParJournee $classement */
        foreach ($classementParJournee as $classementInfos){
            $classementTriParEquipe[$classementInfos->getEquipe()][] = $classementInfos->getPlace();
        }

        $nbjournees = [];
        for ($i = 1; $i<= (count($classementTriParEquipe)-1)*2 ; $i++){
            $nbjournees[] = $i;
        }

        return $this->render(':default:statistiques.html.twig', [
            'agendas' => $agenda,
            'resultats' => $resultats,
            'classement' => $classement,
            'calendrier' => $calendrier,
            'categorie' => $categ,
            'annees' => $annees,
            'points' => $points,
            'positions' => $positions,
            'classement_par_journee' => $classementTriParEquipe,
            'nb_journees' => $nbjournees,
            'category' => $category
        ]);
    }

    /**
     * @Route("/save-classement/{category}", name="save-classement")
     * @Template()
     */
    public function saveClassementAction($category){
        switch ($category){
            case 'senior-A':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'senior-B':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=ranking');
                break;
            case 'U18':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'U15':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'U13':
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=329051&ph_no=2&gp_no=2');
                break;
        }

        $em = $this->getDoctrine()->getManager();
        $journee = $this->getDoctrine()->getRepository(StatsParJournee::class)->findLastJourneeByCateg($category);
        if ($journee == null){
            $journee = 1;
        }
        foreach ($classement as $classementInfos){
            $statsParjournee = new StatsParJournee();
            $statsParjournee->setCategory($category);
            $statsParjournee->setEquipe(trim($classementInfos['equipe']));
            $statsParjournee->setJournee($journee['journee']+1);
            $statsParjournee->setPlace($classementInfos['place']);
            $em->persist($statsParjournee);
        }

        $em->flush();
        return $this->showAction($category);
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

        $crawler->filter('.confrontation');

        $resultats = [];

        for ($i = 0; $i < $crawler->filter('.confrontation')->count(); $i++) {
            $craw = $crawler->filter('.confrontation')->eq($i);

            $equipe1 = trim($craw->filter('.equipe1')->filter('.name')->text());
            $equipe2 = trim($craw->filter('.equipe2')->text());

            $date = $this->convertDate($craw->filter('.date')->first()->text());
            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'date'=> $date
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



        $crawler->filter('.confrontation');

        $resultats = [];

        for ($i = 0; $i < $crawler->filter('.confrontation')->count(); $i++) {
            $craw = $crawler->filter('.confrontation')->eq($i);

            $equipe1 = trim($craw->filter('.equipe1')->filter('.name')->text());
            $equipe2 = trim($craw->filter('.equipe2')->text());

            $date = $this->convertDate($craw->filter('.date')->first()->text());



            if (($craw->filter('.number')->count()> 0)){
                $score = $craw->filter('.score_match')->html();
                $scoreExposed = explode(' - ', $score);
                $scoreDomicile = $this->getNombre($scoreExposed[0]);
                $scoreExterieur = $this->getNombre($scoreExposed[1]);
                $score = $scoreDomicile . ' - ' . $scoreExterieur;
            }
            else{
                $score = '-';
            }

            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'date'=> $date,
                'score'=>$score
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

        $crawler->filter('.ranking-tab');

        $classement = [];

        for ($i = 1; $i < $crawler->filter('.ranking-tab > tr')->count(); $i++) {
            $craw = $crawler->filter('.ranking-tab > tr')->eq($i);
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

        $crawler->filter('.confrontation');

        $resultats = [];


        for ($i = 0; $i < $crawler->filter('.confrontation')->count(); $i++) {
            $craw = $crawler->filter('.confrontation')->eq($i);
            $equipe1 = trim($craw->filter('.equipe1')->filter('.name')->text());
            $equipe2 = trim($craw->filter('.equipe2')->text());
            $date = $this->convertDate($craw->filter('.date')->first()->text());

            if (($craw->filter('.number')->count()> 0)){
                $score = $craw->filter('.score_match')->html();
                $scoreExposed = explode(' - ', $score);
                $scoreDomicile = $this->getNombre($scoreExposed[0]);
                $scoreExterieur = $this->getNombre($scoreExposed[1]);
                $score = $scoreDomicile . ' - ' . $scoreExterieur;
            }
            else{
                $score = '-';
            }

            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'score' => $score,
                'date'=> $date
            ];
        }

        return $resultats;
    }

    public function convertDate($date){
        $dateRegex = preg_replace('(\s+)', ' ', $date);
        $dateSplit = explode(' ',$dateRegex);
        switch ($dateSplit[3]){
            case 'janvier':
                $dateSplit[3] = "01";
                break;
            case 'février':
            case 'fevrier':
            $dateSplit[3] = "02";
                break;
            case 'mars':
                $dateSplit[3] = "03";
                break;
            case 'avril':
                $dateSplit[3] = "04";
                break;
            case 'mai':
                $dateSplit[3] = "05";
                break;
            case 'juin':
                $dateSplit[3] = "06";
                break;
            case 'jullet':
                $dateSplit[3] = "07";
                break;
            case 'aout':
            case 'août':
                $dateSplit[3] = "08";
                break;
            case 'septembre':
                $dateSplit[3] = "09";
                break;
            case 'octobre':
                $dateSplit[3] = "10";
                break;
            case 'novembre':
                $dateSplit[3] = "11";
                break;
            case 'décembre':
            case 'decembre':
            $dateSplit[3] = "12";
                break;
        }
        return $dateSplit[2] . "/" . $dateSplit[3] . "/" . $dateSplit[4];
    }

    public function getNumberByImgUrl($imgUrl){
        if ($imgUrl == 'vide'){
            return '';
        }
        $imgHeaders = get_headers($imgUrl, 1);

        switch ($imgHeaders['Content-Length']){
            case '2543':
                $score = '0';
                break;
            case '733':
                $score = '1';
                break;
            case '1921':
                $score = '2';
                break;
            case '1987':
                $score = '3';
                break;
            case '1595':
                $score = '4';
                break;
            case '1909':
                $score = '5';
                break;
            case '2632':
                $score = '6';
                break;
            case '1276':
                $score = '7';
                break;
            case '2585':
                $score = '8';
                break;
            case '2570':
                $score = '9';
                break;
        }

        return $score;
    }

    private function getNombre($html){
        $crawler = new Crawler($html);
        $nombre = null;
        for ($i=0; $i <= $crawler->filter('.number')->count() -1; $i++ ){
            $nombre = $nombre . $this->getNumberByImgUrl($crawler->filter('.number')->eq($i)->attr('src'));
        }
        return $nombre;
    }
}