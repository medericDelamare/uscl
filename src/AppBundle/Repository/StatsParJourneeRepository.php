<?php
/**
 * Created by PhpStorm.
 * User: delamare
 * Date: 19/09/2017
 * Time: 23:04
 */

namespace AppBundle\Repository;


use AppBundle\Entity\StatsParJournee;
use Doctrine\ORM\EntityRepository;

class StatsParJourneeRepository extends EntityRepository
{
    public function findByCategOrderByJournee($categ){
        return $this->createQueryBuilder('c')
            ->where('c.category = :categ')
            ->orderBy('c.journee', 'ASC')
            ->setParameter('categ', $categ)
            ->getQuery()
            ->getResult();
    }

    public function findNbJourneeByCateg($categ){
        return $this->createQueryBuilder('s')
            ->select('s.journee')
            ->where('s.category = :categ')
            ->orderBy('s.journee', 'ASC')
            ->setParameter('categ', $categ)
            ->distinct()
            ->getQuery()
            ->getResult();
    }

    public function findLastJourneeByCateg($categ){
        return $this->createQueryBuilder('s')
            ->select('s.journee')
            ->where('s.category = :categ')
            ->orderBy('s.journee', 'ASC')
            ->setParameter('categ', $categ)
            ->setMaxResults(1)
            ->distinct()
            ->getQuery()
            ->getSingleScalarResult();
    }
}