<?php


namespace AppBundle\Service;


use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsRencontre;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpKernel\KernelInterface;

class StatistiquesService
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function getLastFiveResultByPlayer(Licencie $licencie){
        $statsRencontres = $licencie->getStatsRencontresJoueurs();

        /**
         * Tri des rencontres en fonction de la date
         */
        $statsRencontres->getIterator()->uasort(function ($first, $second) {
            return $first->getRencontre()->getDate() > $second->getRencontre()->getDate() ? 1 : -1;
        });

        $lastFiveStatsResults = array_slice(iterator_to_array($statsRencontres),-5);
        $lastFiveResult = [];
        foreach ($lastFiveStatsResults as $stats){
            if ($stats->getRencontre()->getScoreDom() != null && $stats->getRencontre()->getScoreDom() == $stats->getRencontre()->getScoreExt()){
                $lastFiveResult[] = 'N';
            }
            else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() > $stats->getRencontre()->getScoreExt()){
                $lastFiveResult[] = 'V';
            }
            else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() < $stats->getRencontre()->getScoreExt()){
                $lastFiveResult[] = 'V';
            }
            else{
                $lastFiveResult[] = 'D';
            }
        }

        return $lastFiveResult;
    }

    // TODO à renomer

    public function getStatistiquesRencontres(Licencie $licencie){
        $v=0;
        $n=0;
        $d=0;

        /** @var StatsRencontre $stats */
        foreach ($licencie->getStatsRencontresJoueurs() as $stats) {
            $scoreDom = $stats->getRencontre()->getScoreDom();
            $scoreExt = $stats->getRencontre()->getScoreExt();
            $usclScorencoParameter = $this->kernel->getContainer()->getParameter('uscl_scorenco_id');
            
            if ($scoreDom != null && $scoreDom == $scoreExt){
                $n++;
            } else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getScorencoId() == $usclScorencoParameter && $scoreDom > $scoreExt){
                $v++;
            } else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getScorencoId() == $usclScorencoParameter && $scoreDom < $scoreExt){
                $v++;
            } else{
                $d++;
            }
        }

        return [$v,$n,$d];
    }
}