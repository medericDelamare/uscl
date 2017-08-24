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

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'prochainsMatchs' => $prochainsMatchs
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
