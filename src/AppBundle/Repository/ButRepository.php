<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use Doctrine\ORM\EntityRepository;

class ButRepository extends EntityRepository
{
    public function findButeursByCategorie($debutSaison, $finSaison, $categories){
        return $this->createQueryBuilder('b')
            ->join(StatsRencontre::class, 's', 'WITH', 's.id = b.statsRencontres')
            ->join(Rencontre::class, 'r', 'WITH', 's.rencontre = r.id')
            ->join(Equipe::class, 'e', 'WITH', 'e.id = r.equipeDomicile')
            ->where('r.date > :dateDebut')
            ->andwhere('r.date < :dateFin')
            ->andWhere('e.categorie IN (:categories)')
            ->setParameters(['dateDebut' => $debutSaison, 'dateFin' => $finSaison, 'categories' => $categories])
            ->getQuery()
            ->getResult();
    }
}