<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\Rencontre;
use Doctrine\ORM\EntityRepository;

class RencontreRepository extends EntityRepository
{
    public function getRencontresByCategorie($categorie){
        $query = $this->createQueryBuilder('r')
            ->select('r')
            ->join(Equipe::class, 'd')
            ->where('d.categorie = :categorie')
            ->setParameter('categorie', $categorie)
            ->getQuery();

        return $query->getResult();
    }

    public function getDerniereJournee($categorie){
        $dernireJournee = $this->createQueryBuilder('r')
            ->select('r.journee')
            ->join(Equipe::class, 'd')
            ->where('d.categorie = :categorie')
            ->orderBy('r.date', 'DESC')
            ->setParameter('categorie', $categorie)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleScalarResult();

        $rencontres = $this->createQueryBuilder('r')
            ->where('r.journee = :derniereJournee')
            ->setParameter('derniereJournee', $dernireJournee)
            ->getQuery()
            ->getResult();

        return $rencontres;
    }
}