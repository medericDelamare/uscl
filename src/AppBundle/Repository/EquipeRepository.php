<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\StatsEquipe;
use Doctrine\ORM\EntityRepository;

class EquipeRepository extends EntityRepository
{
    public function resetStats(){
        $em = $this->getEntityManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("UPDATE equipe SET 
            equipe.stats_points = 0, 
            equipe.stats_journees = 0, 
            equipe.stats_victoires = 0, 
            equipe.stats_nuls = 0, 
            equipe.stats_defaites = 0, 
            equipe.stats_forfaits = 0, 
            equipe.stats_buts_pour = 0,
            equipe.stats_buts_contre = 0,
            equipe.stats_penalites = 0,
            equipe.stats_difference = 0
            ");
        $statement->execute();
    }
}