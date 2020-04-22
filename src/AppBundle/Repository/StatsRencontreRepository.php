<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsRencontre;
use Doctrine\ORM\EntityRepository;

class StatsRencontreRepository extends EntityRepository
{
    public function getStatsRencontreSansImage(){
        return $this->createQueryBuilder('s')
            ->where('s.imageGeneree = 0')
            ->getQuery()
            ->getResult();
    }

    public function getStatsRencontreOrderByDate(Licencie $joueur, $dateDepart, $dateFin){
        return $this->createQueryBuilder('s')
            ->join('s.joueurs','j')
            ->join('s.rencontre', 'r')
            ->addSelect('j')
            ->where('j.id = :joueur')
            ->andWhere('r.date > :dateDepart')
            ->andWhere('r.date < :dateFin')
            ->orderBy('r.date')
            ->setParameters([
                'joueur' => $joueur->getId(),
                'dateDepart' => $dateDepart,
                'dateFin' => $dateFin
            ])
            ->getQuery()
            ->getResult();
    }

    public function getStatsRencontreByCategorie($dateDepart, $dateFin, $categories){
        return $this->createQueryBuilder('s')
            ->join('s.rencontre', 'r')
            ->join('r.equipeDomicile', 'e')
            ->andWhere('r.date > :dateDepart')
            ->andWhere('r.date < :dateFin')
            ->andWhere('e.categorie in (:categories)')
            ->orderBy('r.date')
            ->setParameters([
                'dateDepart' => $dateDepart,
                'dateFin' => $dateFin,
                'categories' => $categories
            ])
            ->getQuery()
            ->getResult();
    }
}