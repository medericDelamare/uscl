<?php

namespace AppBundle\Controller;

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
        $prochainsMatchs = $this->getAgenda('https://www.fff.fr/la-vie-des-clubs/104246/agenda');
        $resultats = $this->getResult('https://eure.fff.fr/recherche-clubs/?scl=104246&tab=resultats');

        dump($resultats);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'prochainsMatchs' => $prochainsMatchs,
            'resultats' => $resultats
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

        $crawler->filter('.bloc_result');

        $resultats = [];

        for ($i = 0; $i < $crawler->filter('.bloc_result')->count(); $i++) {

            $craw = $crawler->filter('.bloc_result')->eq($i);
            $date = $this->convertDate($craw->filter('h4')->first()->text());

            if ($craw->filter('.regular')->count() == 2){
                $equipe1 = $craw->filter('.regular')->eq(0)->text();
                $equipe2 = $craw->filter('.regular')->eq(1)->text();
            } else{
                $equipe1 = $craw->filter('.regular')->eq(0)->text();
                $equipe2 = 'Exempt';
            }

            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'date' => $date,
            ];
        }

        for ($i = 0; $i < $crawler->filter('.sub_tilte')->count(); $i++) {
            $resultats[$i]['competition'] =
                $crawler->filter('.sub_tilte')->eq($i)->text()
            ;
        }
        return $resultats;
    }

    private function getResult($url){
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);
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


        for ($i = 0; $i < $crawler->filter('.confrontation')->count(); $i++) {
            $craw = $crawler->filter('.confrontation')->eq($i);
            $competition = $craw->filter('.competition')->text();
            $equipe1 = trim($craw->filter('.equipe1')->filter('.name')->text());
            $equipe2 = trim($craw->filter('.equipe2')->text());

            if (($craw->filter('.number')->count() > 0)) {
                $score = $craw->filter('.score_match')->html();
                $scoreExposed = explode(' - ', $score);
                $scoreDomicile = $this->getNombre($scoreExposed[0]);
                $scoreExterieur = $this->getNombre($scoreExposed[1]);
                $score = $scoreDomicile . ' - ' . $scoreExterieur;
            } else {
                $score = '-';
            }
            $resultats[] = [
                'equipe1' => $equipe1,
                'equipe2' => $equipe2,
                'competition' => $competition,
                'score' => $score
            ];
        }

        $crawler->filter('.date span')->each(function (Crawler $crawler) {
            foreach ($crawler as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        for ($i = 0; $i < $crawler->filter('.date')->count(); $i++) {
            $craw = $crawler->filter('.date')->eq($i);
            $resultats[$i]['date'] = $this->convertDate(str_replace('<br>', '',$craw->html()));
        }

        return $resultats;
    }

    public function convertDate($date){
        $dateRegex = trim(preg_replace('(\s+)', ' ', $date));
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

    public function getNumberByImgUrl($imgUrl)
    {
        if ($imgUrl == 'vide') {
            return '';
        }
        $imgHeaders = get_headers($imgUrl, 1);

        switch ($imgHeaders['Content-Length']) {
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

    private function getNombre($html)
    {
        $crawler = new Crawler($html);
        $nombre = null;
        for ($i = 0; $i <= $crawler->filter('.number')->count() - 1; $i++) {
            $nombre = $nombre . $this->getNumberByImgUrl($crawler->filter('.number')->eq($i)->attr('src'));
        }
        return $nombre;
    }
}
