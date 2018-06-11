<?php
namespace AppBundle\Command;



use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

class saveRencontresCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('save:rencontres')
            ->setDescription('Récupération des données sur le disctrict');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
            $ch = curl_init();


            curl_setopt($ch, CURLOPT_URL, 'https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=calendar');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_exec($ch);

            $html = curl_exec($ch);

            curl_close($ch);

            $crawler = new Crawler($html);

            $crawler->filter('.confrontation');

            for ($i = 0; $i < $crawler->filter('.results-content')->count(); $i++) {
                $craw = $crawler->filter('.results-content')->eq($i);
                if (($craw->filter('.widgettitle > span')->count() > 0)) {
                    $journee = $craw->filter('.widgettitle > span')->text();
                    for ($j = 0; $j < $craw->filter('.result-display')->count(); $j++){
                        $crawRencontre = $craw->filter('.result-display')->eq($j);
                        $equipe1 = trim($crawRencontre->filter('.equipe1 > .name')->text());
                        $equipe2 = trim($crawRencontre->filter('.equipe2 > .name')->text());
                        $date = $this->convertDate($crawRencontre->filter('.date')->first()->text());
                        $date = \DateTime::createFromFormat('d/m/Y H:i', $date);
                        if (($crawRencontre->filter('.number')->count() > 0)) {
                            $score = $crawRencontre->filter('.score_match')->html();
                            $scoreExposed = explode(' - ', $score);
                            $scoreDomicile = $this->getNombre($scoreExposed[0]);
                            $scoreExterieur = $this->getNombre($scoreExposed[1]);
                            $score = $scoreDomicile . ' - ' . $scoreExterieur;
                        } else {
                            $score = '-';
                        }
                    }
                } else {
                }
            }

            die;


        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
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

    private function convertDate($date)
    {
        $dateRegex = preg_replace('(\s+)', ' ', $date);
        $dateSplit = explode(' ', $dateRegex);
        switch ($dateSplit[6]) {
            case 'janvier':
                $dateSplit[6] = "01";
                break;
            case 'février':
            case 'fevrier':
                $dateSplit[6] = "02";
                break;
            case 'mars':
                $dateSplit[6] = "03";
                break;
            case 'avril':
                $dateSplit[6] = "04";
                break;
            case 'mai':
                $dateSplit[6] = "05";
                break;
            case 'juin':
                $dateSplit[6] = "06";
                break;
            case 'jullet':
                $dateSplit[6] = "07";
                break;
            case 'aout':
            case 'août':
                $dateSplit[6] = "08";
                break;
            case 'septembre':
                $dateSplit[6] = "09";
                break;
            case 'octobre':
                $dateSplit[6] = "10";
                break;
            case 'novembre':
                $dateSplit[6] = "11";
                break;
            case 'décembre':
            case 'decembre':
                $dateSplit[6] = "12";
                break;
        }

        $heure = explode('H',$dateSplit[9]);
        return $dateSplit[3] . "/" . $dateSplit[6] . "/" . $dateSplit[7] . ' ' . $heure[0] . ':' . $heure[1];
    }
}