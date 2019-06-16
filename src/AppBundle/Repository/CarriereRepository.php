<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CarriereRepository extends EntityRepository
{
    public function nbLicencie(){
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->where("c.saison LIKE '2018-2019'")
            ->andWhere("c.clubParse LIKE 'U.S. CORMEILLES - LIEUREY' ")
            ->getQuery()
            ->getSingleScalarResult();
    }
}