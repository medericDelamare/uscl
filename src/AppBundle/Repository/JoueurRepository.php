<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class JoueurRepository extends EntityRepository
{

    public function findByCategoryAndPost($category, $poste){
        return $this->createQueryBuilder('j')
            ->where('j.categorie = :category')
            ->andWhere('j.poste = :poste')
            ->setParameter('poste', $poste)
            ->setParameter('category', $category)
            ->orderBy('j.nom')
            ->getQuery()
            ->getResult();
    }

    public function findByCategoryAndByBut($category){
        $query =  $this->createQueryBuilder('j')
            ->where('j.categorie = :categorie')
            ->andWhere('j.buts > 0')
            ->setParameter('categorie', $category)
            ->orderBy('j.buts', 'DESC')
            ->getQuery()
            ->getResult();

        return $query;
    }
}