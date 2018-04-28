<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class JoueurRepository extends EntityRepository
{

    public function findByCategoryAndPost($category,$poste){

        $categories = [];
        switch ($category){
            case 'Senior':
                $categories = ['Senior', 'Senior U20 (- 20 ans)', 'U19 (- 19 ans)'];
                break;
            case 'U18':
                $categories = ['U18 (- 18 ans)', 'U17 (- 17 ans)', 'U16 (- 16 ans)'];
                break;
            case 'U15':
                $categories = ['U15 (- 15 ans)', 'U14 (- 14 ans)'];
                break;
            case 'U13':
                $categories = ['U13 F (- 13 ans F)', 'U13 (- 13 ans)', 'U12 F (- 12 ans F)', 'U12 (- 12 ans)'];
                break;
        }


        return $this->createQueryBuilder('j')
            ->join('j.categorie','c')
            ->where('c.nom IN (:categories)')
            ->andWhere('j.poste = :poste')
            ->orderBy('j.nom')
            ->setParameter('poste', $poste)
            ->setParameter('categories', $categories)
            ->getQuery()
            ->getResult();
    }

    public function findByCategoryAndByBut($category){
        $categories = [];
        switch ($category){
            case 'Senior':
                $categories = ['Senior', 'Senior U20 (- 20 ans)', 'U19 (- 19 ans)'];
                break;
            case 'U18':
                $categories = ['U18 (- 18 ans)', 'U17 (- 17 ans)', 'U16 (- 16 ans)'];
                break;
            case 'U15':
                $categories = ['U15 (- 15 ans)', 'U14 (- 14 ans)'];
                break;
            case 'U13':
                $categories = ['U13 F (- 13 ans F)', 'U13 (- 13 ans)', 'U12 F (- 12 ans F)', 'U12 (- 12 ans)'];
                break;
        }
        $query =  $this->createQueryBuilder('j')
            ->join('j.categorie', 'c')
            ->where('c.nom IN (:categories)')
            ->andWhere('j.buts > 0')
            ->setParameter('categories', $categories)
            ->orderBy('j.buts', 'DESC')
            ->getQuery()
            ->getResult();

        return $query;
    }
}