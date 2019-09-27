<?php
/**
 * Created by PhpStorm.
 * User: delamare
 * Date: 16/06/2019
 * Time: 22:42
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class NombreLicenciesParAnneesRepository extends EntityRepository
{
    public function getAllOrderByAnneeDebut(){
        return $this->createQueryBuilder('nb')
            ->orderBy('nb.anneeDepart')
            ->getQuery()
            ->getResult();
    }
}