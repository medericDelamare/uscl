<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsRencontre;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class ProfileController
 * @package AppBundle\Controller
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile/{id}", name="profile")
     * @Template()
     */
    public function profileShowAction($id){
        /**
         * @var Licencie $joueur
         */
        $joueur = $this->getDoctrine()->getManager()->getRepository(Licencie::class)->find($id);

        /** @var \DateTime $birthDate */
        $birthDate = $joueur->getDateDeNaissance();
        $to   = new \DateTime('today');
        $age = $birthDate->diff($to)->y;


        $saisons = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $saisons[] = $historiqueStat->getSaison();
        }
        array_push($saisons, '18/19');
        /**
         * @var StatsRencontre $stats
         */

        $v=0;
        $n=0;
        $d=0;

        $iterator = $joueur->getStatsRencontresJoueurs()->getIterator();

        $iterator->uasort(function ($first, $second) {
            return $first->getRencontre()->getDate() > $second->getRencontre()->getDate() ? 1 : -1;
        });

        $lasts = array_slice(iterator_to_array($iterator),-5);
        $fiveLastsResults = [];
        foreach ($lasts as $stats){
            if ($stats->getRencontre()->getScoreDom() != null && $stats->getRencontre()->getScoreDom() == $stats->getRencontre()->getScoreExt()){
                $fiveLastsResults[] = 'N';
            }
            else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() > $stats->getRencontre()->getScoreExt()){
                $fiveLastsResults[] = 'V';
            }
            else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() < $stats->getRencontre()->getScoreExt()){
                $fiveLastsResults[] = 'V';
            }
            else{
                $fiveLastsResults[] = 'D';
            }
        }

        foreach ($joueur->getStatsRencontresJoueurs() as $stats) {
            if ($stats->getRencontre()->getScoreDom() != null && $stats->getRencontre()->getScoreDom() == $stats->getRencontre()->getScoreExt()){
                $n++;
            }
            else if ($stats->getRencontre()->getEquipeDomicile()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() > $stats->getRencontre()->getScoreExt()){
                $v++;
            }
            else if ($stats->getRencontre()->getEquipeExterieure()->getClub()->getNom() == "USCL" && $stats->getRencontre()->getScoreDom() < $stats->getRencontre()->getScoreExt()){
                $v++;
            }
            else{
                $d++;
            }
        }

        return $this->render(':default:profil.html.twig', [
            'joueur' => $joueur,
            'age' => $age,
            'saisons' => $saisons,
            'vnd' => [$v,$n,$d],
            'lastResults' => $fiveLastsResults
        ]);
    }
}