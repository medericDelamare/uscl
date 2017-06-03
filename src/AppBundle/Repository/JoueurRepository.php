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
}