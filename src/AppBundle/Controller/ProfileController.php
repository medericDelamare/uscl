<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsRencontre;
use AppBundle\Service\StatistiquesService;
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

        /** @var Licencie $joueur */
        $joueur = $this->getDoctrine()->getManager()->getRepository(Licencie::class)->find($id);


        $saisons = [];
        foreach ($joueur->getHistoriqueStats() as $historiqueStat){
            $saisons[] = $historiqueStat->getSaison();
        }
        array_push($saisons, '18/19');

        /** @var StatistiquesService $statistiquesService */
        $statistiquesService = $this->container->get('app.statistiques_service');

        return $this->render(':default:profil.html.twig', [
            'joueur' => $joueur,
            'saisons' => $saisons,
            'vnd' => $statistiquesService->getStatistiquesRencontres($joueur),
            'lastResults' => $statistiquesService->getLastFiveResultByPlayer($joueur)
        ]);
    }
}