<?php


namespace AppBundle\Repository;


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
}