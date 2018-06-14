<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Equipe;
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
}