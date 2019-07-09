<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use Doctrine\ORM\EntityRepository;

class ButRepository extends EntityRepository
{
    public function findAllByCurrentYear($debutSaison, $finSaison){
        return $this->createQueryBuilder('b')
            ->join(StatsRencontre::class, 's', 'WITH', 's.id = b.statsRencontres')
            ->join(Rencontre::class, 'r', 'WITH', 's.rencontre = r.id')
            ->where('r.date > :dateDebut')
            ->andwhere('r.date < :dateFin')
            ->setParameters(['dateDebut' => $debutSaison, 'dateFin' => $finSaison])
            ->getQuery()
            ->getResult();


    }
}