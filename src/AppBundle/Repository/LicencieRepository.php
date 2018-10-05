<?php


namespace AppBundle\Repository;


use AppBundle\Entity\StatsJoueur;
use Doctrine\ORM\EntityRepository;

class LicencieRepository extends EntityRepository
{

    public function findFootballAnimation(){
        $u7Categories = ['Libre / U6 (- 6 ans)', 'Libre / U7 (- 7 ans)','Libre / U7 F (- 7 ans F)'];
        $u9Categories = ['Libre / U8 (- 8 ans)','Libre / U9 (- 9 ans)'];
        $u11Categories = ['Libre / U10 (- 10 ans)', 'Libre / U11 (- 11 ans)'];

        $footballAnimation = [];
        $u7 = $this->createQueryBuilder('j')
            ->where('j.categorie IN (:categories)')
            ->orderBy('j.categorie')
            ->setParameter('categories', $u7Categories)
            ->getQuery()
            ->getResult();

        $footballAnimation['u7'] = $u7;

        $u9 = $this->createQueryBuilder('j')
            ->where('j.categorie IN (:categories)')
            ->orderBy('j.categorie')
            ->setParameter('categories', $u9Categories)
            ->getQuery()
            ->getResult();

        $footballAnimation['u9'] = $u9;

        $u11 = $this->createQueryBuilder('j')
            ->where('j.categorie IN (:categories)')
            ->orderBy('j.categorie')
            ->setParameter('categories', $u11Categories)
            ->getQuery()
            ->getResult();

        $footballAnimation['u11'] = $u11;
        return $footballAnimation;

    }

    public function findByCategoryOrderByPoste($category){

        $categories = [];
        switch ($category){
            case 'Veterans':
                $categories = ['Libre / Vétéran'];
                break;
            case 'Senior':
                $categories = ['Libre / Senior', 'Libre / Senior U20 (- 20 ans)', 'Libre / U19 (- 19 ans)'];
                break;
            case 'U18':
                $categories = ['Libre / U18 (- 18 ans)', 'Libre / U17 (- 17 ans)', 'Libre / U16 (- 16 ans)'];
                break;
            case 'U15':
                $categories = ['Libre / U15 (- 15 ans)', 'Libre / U14 (- 14 ans)'];
                break;
            case 'U13':
                $categories = ['Libre / U14 F (- 14 ans F)', 'Libre / U13 F (- 13 ans F)', 'Libre / U13 (- 13 ans)', 'Libre / U12 F (- 12 ans F)', 'Libre / U12 (- 12 ans)'];
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


    public function findBirthday(){
        $now = new \DateTime();
        return $this->createQueryBuilder('j')
            ->where('DAY(j.dateDeNaissance) = :day')
            ->andWhere('MONTH(j.dateDeNaissance) = :month')
            ->setParameters(['day'=>$now->format('d'), 'month' => $now->format('m')])
            ->getQuery()
            ->getResult();


    }
}