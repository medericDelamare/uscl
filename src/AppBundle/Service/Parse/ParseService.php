<?php


namespace AppBundle\Service\Parse;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\Rencontre;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DomCrawler\Crawler;

class ParseService
{

    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getStats($url){
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);
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

        // Truncate de la table rencontre à chaque commande
        $connection = $this->em->getConnection();
        $platform   = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL('rencontre', false));

        // reset des stats sur les différentes equipes
        $this->em->getRepository(Equipe::class)->resetStats();

        for ($i = 0; $i < $crawler->filter('.results-content')->count(); $i++) {
            $craw = $crawler->filter('.results-content')->eq($i);
            if (($craw->filter('.widgettitle > span')->count() > 0)) {
                $journee = $craw->filter('.widgettitle > span')->text();
                $journee = (int)str_replace('Journée ', '', $journee);
                for ($j = 0; $j < $craw->filter('.result-display')->count(); $j++){
                    $crawRencontre = $craw->filter('.result-display')->eq($j);
                    $equipe1 = trim($crawRencontre->filter('.equipe1 > .name')->text());

                    $equipe2 = trim($crawRencontre->filter('.equipe2 > .name')->text());
                    $date = $this->convertDate($crawRencontre->filter('.date')->first()->text());
                    $date = \DateTime::createFromFormat('d/m/Y H:i', $date);

                    $isForfaitDom = empty(trim($crawRencontre->filter('.equipe1 > .forfeit')->text())) ? $forfaitDom = false : $forfaitDom=true;
                    $isForfaitExt = empty(trim($crawRencontre->filter('.equipe2 > .forfeit')->text())) ? $forfaitExt = false : $forfaitExt=true;

                    if (($crawRencontre->filter('.number')->count() > 0)) {
                        $score = $crawRencontre->filter('.score_match')->html();
                        $scoreExposed = explode(' - ', $score);
                        $scoreDomicile = $this->getNombre($scoreExposed[0]);
                        $scoreExterieur = $this->getNombre($scoreExposed[1]);
                        $score = $scoreDomicile . ' - ' . $scoreExterieur;

                        /** @var Equipe $equipeDom */
                        $equipeDom = $this->em->getRepository(Equipe::class)->findOneByNomParse($equipe1);

                        /** @var Equipe $equipeExt */
                        $equipeExt = $this->em->getRepository(Equipe::class)->findOneByNomParse($equipe2);

                        if ($isForfaitDom){
                            $statsDom = $equipeDom->getStats();
                            $statsDom
                                ->addPoints(0)
                                ->addForfait()
                                ->addButsContre($scoreExterieur)
                                ->addJournee()
                                ->addDifference(-3)
                                ->addButsPour($scoreDomicile)
                            ;

                            $statsExt = $equipeExt->getStats();
                            $statsExt
                                ->addPoints(4)
                                ->addButsContre($scoreDomicile)
                                ->addJournee()
                                ->addVictoire()
                                ->addDifference(3)
                                ->addButsPour($scoreExterieur);
                        }elseif ($isForfaitExt){
                            $statsDom = $equipeDom->getStats();
                            $statsDom
                                ->addPoints(4)
                                ->addVictoire()
                                ->addButsContre($scoreExterieur)
                                ->addJournee()
                                ->addButsPour($scoreDomicile)
                                ->addDifference(3)
                            ;

                            $statsExt = $equipeExt->getStats();
                            $statsExt
                                ->addPoints(0)
                                ->addForfait()
                                ->addButsContre($scoreExterieur)
                                ->addJournee()
                                ->addButsPour($scoreDomicile)
                                ->addDifference(-3)
                            ;
                        }
                        elseif ($scoreDomicile > $scoreExterieur){
                            $statsDom = $equipeDom->getStats();
                            $statsDom
                                ->addPoints(4)
                                ->addVictoire()
                                ->addButsPour($scoreDomicile)
                                ->addButsContre($scoreExterieur)
                                ->addJournee()
                                ->addDifference($scoreDomicile - $scoreExterieur)
                            ;

                            $statsExt = $equipeExt->getStats();
                            $statsExt
                                ->addPoints(1)
                                ->addDefaite()
                                ->addButsPour($scoreExterieur)
                                ->addButsContre($scoreDomicile)
                                ->addDifference($scoreExterieur - $scoreDomicile)
                                ->addJournee();
                        }elseif ($scoreDomicile < $scoreExterieur){
                            $statsDom = $equipeDom->getStats();
                            $statsDom
                                ->addPoints(1)
                                ->addDefaite()
                                ->addButsPour($scoreDomicile)
                                ->addButsContre($scoreExterieur)
                                ->addDifference($scoreDomicile - $scoreExterieur)
                                ->addJournee()
                            ;

                            $statsExt = $equipeExt->getStats();
                            $statsExt
                                ->addPoints(4)
                                ->addVictoire()
                                ->addButsPour($scoreExterieur)
                                ->addButsContre($scoreDomicile)
                                ->addDifference($scoreExterieur - $scoreDomicile)
                                ->addJournee();
                        }  elseif ( $scoreDomicile == $scoreExterieur){
                            $statsDom = $equipeDom->getStats();
                            $statsDom
                                ->addPoints(2)
                                ->addNul()
                                ->addButsPour($scoreExterieur)
                                ->addButsContre($scoreDomicile)
                                ->addJournee();

                            $statsExt = $equipeExt->getStats();
                            $statsExt
                                ->addPoints(2)
                                ->addNul()
                                ->addButsPour($scoreExterieur)
                                ->addButsContre($scoreDomicile)
                                ->addJournee();
                        }

                        $rencontre = new Rencontre();
                        $rencontre
                            ->setEquipeDomicile($equipeDom)
                            ->setEquipeExterieure($equipeExt)
                            ->setDate($date)
                            ->setJournee($journee)
                            ->setScore($score);
                        $this->em->persist($equipeExt);
                        $this->em->persist($equipeDom);
                        $this->em->persist($rencontre);
                        $this->em->flush();
                    }
                }
            }
        }

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