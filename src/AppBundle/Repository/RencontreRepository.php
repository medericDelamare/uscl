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
            ->join('r.equipeDomicile', 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->leftJoin('r.equipeExterieure', 'e', 'WITH', 'e.id = r.equipeExterieure')
            ->where('d.categorie = :categorie')
            ->orWhere('e.categorie = :categorie')
            ->setParameter('categorie', $categorie)
            ->getQuery();

        return $query->getResult();
    }

    public function getDerniereJournee($categorie){
        $dernireJournee = $this->createQueryBuilder('r')
            ->select('r.journee')
            ->join(Equipe::class, 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->where('d.categorie = :categorie')
            ->andWhere('r.score IS NOT NULL')
            ->orderBy('r.date', 'DESC')
            ->setParameter('categorie', $categorie)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        $rencontres = $this->createQueryBuilder('r')
            ->join('r.equipeDomicile', 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->where('r.journee = :derniereJournee')
            ->andWhere('d.categorie = :categorie')
            ->setParameter('derniereJournee', $dernireJournee)
            ->setParameter('categorie', $categorie)
            ->getQuery()
            ->getResult();

        return $rencontres;
    }

    public function getAgenda($categorie){
        $prochaineJournee = $this->createQueryBuilder('r')
            ->select('r.journee')
            ->join(Equipe::class, 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->where('d.categorie = :categorie')
            ->andWhere('r.score IS NULL')
            ->orderBy('r.date', 'ASC')
            ->setParameter('categorie', $categorie)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleScalarResult();

        $agendas = $rencontres = $this->createQueryBuilder('r')
            ->where('r.journee = :derniereJournee')
            ->setParameter('derniereJournee', $prochaineJournee)
            ->getQuery()
            ->getResult();

        return $agendas;
    }

    public function getCalendrierParCategorie($categorie){
        return $this->createQueryBuilder('r')
            ->join(Equipe::class, 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->where('d.categorie = :categorie')
            ->orderBy('r.date', 'ASC')
            ->setParameter('categorie', $categorie)
            ->getQuery()
            ->getResult();
    }

    public function getCalendrierParEquipe($equipe){
        return $this->createQueryBuilder('r')
            ->join('r.equipeDomicile', 'd', 'WITH', 'd.id = r.equipeDomicile')
            ->leftJoin('r.equipeExterieure', 'e', 'WITH', 'e.id = r.equipeExterieure')
            ->where('d.id = :equipe')
            ->orWhere('e.id = :equipe')
            ->orderBy('r.date', 'ASC')
            ->setParameter('equipe', $equipe)
            ->getQuery()
            ->getResult();
    }
}