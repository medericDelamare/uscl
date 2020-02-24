<?php


namespace AppBundle\Service;


use AppBundle\Entity\Licencie;
use Doctrine\Common\Collections\Criteria;

class StatistiquesService
{
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

        foreach ($licencie->getStatsRencontresJoueurs() as $stats) {
            if ($stats->getRencontre()->getScoreDom() != null && $stats->getRencontre()->getScoreDom() == $stats->getRencontre()->getScoreExt()){
                $n++;
            }
            else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() > $stats->getRencontre()->getScoreExt()){
                $v++;
            }
            else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() < $stats->getRencontre()->getScoreExt()){
                $v++;
            }
            else{
                $d++;
            }
        }

        return [$v,$n,$d];
    }
}