<?php


namespace AppBundle\Repository;


use AppBundle\Entity\StatsJoueur;
use Doctrine\ORM\EntityRepository;

class LicencieRepository extends EntityRepository
{
    public function findByCategoryOrderByPoste($category){

        $categories = [];
        switch ($category){
            case 'Senior':
                $categories = ['Libre / Vétéran', 'Libre / Senior', 'Libre / Senior U20 (- 20 ans)', 'Libre / U19 (- 19 ans)'];
                break;
            case 'U18':
                $categories = ['Libre / U18 (- 18 ans)', 'Libre / U17 (- 17 ans)', 'Libre / U16 (- 16 ans)'];
                break;
            case 'U15':
                $categories = ['Libre / U15 (- 15 ans)', 'Libre / U14 (- 14 ans)'];
                break;
            case 'U13':
                $categories = ['Libre / U13 F (- 13 ans F)', 'Libre / U13 (- 13 ans)', 'Libre / U12 F (- 12 ans F)', 'Libre / U12 (- 12 ans)'];
                break;
        }


        return $this->createQueryBuilder('j')
            ->join(StatsJoueur::class, 's', 'WITH', 's.id = j.stats')
            ->where('j.categorie IN (:categories)')
            ->andWhere('s.poste IS NOT NULL')
            ->setParameter('categories', $categories)
            ->getQuery()
            ->getResult();
    }
}