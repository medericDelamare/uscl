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

    public function getLastFiveResultByPlayer(Licencie $licencie)
    {
        $statsRencontres = $licencie->getStatsRencontresJoueurs();

        /**
         * Tri des rencontres en fonction de la date
         */
        $statsRencontres->getIterator()->uasort(function ($first, $second) {
            return $first->getRencontre()->getDate() > $second->getRencontre()->getDate() ? 1 : -1;
        });

        $lastFiveStatsResults = array_slice(iterator_to_array($statsRencontres), -5);

        return $this->computeFromStatsArray($lastFiveStatsResults)['lastFiveResult'];
    }

    // TODO à renommer
    public function getStatistiquesRencontres(Licencie $licencie)
    {
        return $this->computeFromStatsArray($licencie->getStatsRencontresJoueurs())['vnb'];
    }

    private function computeFromStatsArray($statsRencontresJoueurs){
        $v = 0;
        $n = 0;
        $d = 0;
        $lastFiveResult = [];
        /** @var StatsRencontre $stats */
        foreach ($statsRencontresJoueurs as $stats) {
            $scoreDom = $stats->getRencontre()->getScoreDom();
            $scoreExt = $stats->getRencontre()->getScoreExt();
            $usclScorencoParameter = $this->kernel->getContainer()->getParameter('club')['uscl'];

            if ($scoreDom != null && $scoreDom == $scoreExt) {
                $n++;
                $lastFiveResult[] = ['N' => $stats->getRencontre()->__toString()];
            } else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getScorencoId() == $usclScorencoParameter && $scoreDom > $scoreExt) {
                $v++;
                $lastFiveResult[] = ['V' => $stats->getRencontre()->__toString()];;
            } else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getScorencoId() == $usclScorencoParameter && $scoreDom < $scoreExt) {
                $v++;
                $lastFiveResult[] = ['V' => $stats->getRencontre()->__toString()];
            } else {
                $d++;
                $lastFiveResult[] = ['D' => $stats->getRencontre()->__toString()];
            }
        }

        return [
            'vnb' => [$v, $n, $d],
            'lastFiveResult' => $lastFiveResult
        ];
    }
}