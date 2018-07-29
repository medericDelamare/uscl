<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Buteur;
use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ButeursController extends Controller
{

    private $categoriesSeniorA = ['seniorA'];
    private $categoriesSeniorB = ['seniorB'];
    private $categoriesSeniorCoupe = ['coupeDeFrance'];

    private $categoriesVeteransA = ['veteransA'];
    private $categoriesVeteransB = ['veteransB'];
    private $categoriesVeteransCoupe = ['veteransCoupe'];

    private $categoriesU18 = [];
    private $categoriesU18Coupe = [];

    private $categoriesU15 = [];
    private $categoriesU15Coupe = [];



    /**
     * @Route("/buteurs", name="buteurs")
     * @Template()
     */
    public function showAction()
    {
        $buteurs = $this->getDoctrine()->getRepository(Buteur::class)->findAll();

        $buteursSenior=[];
        $buteursVeterans=[];
        $buteursU18=[];
        $buteursU15=[];
        $buteursU13=[];

        foreach ($buteurs as $buteur){
            if (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesSeniorA)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursSenior[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesSeniorB)){
                $buteur->getButeur()->getStats()->incrementButB();
                $buteursSenior[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesSeniorCoupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursSenior[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransA)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursVeterans[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransB)){
                $buteur->getButeur()->getStats()->incrementButB();
                $buteursVeterans[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransCoupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursVeterans[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU18)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursU18[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU18Coupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursU18[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU15)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursU15[] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU15Coupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursU15[] = $buteur->getButeur();
            }
        }

        return $this->render(':default:buteurs.html.twig', [
            'seniors' => $buteursSenior,
            'veterans' => $buteursVeterans,
            'U18' => $buteursU18,
            'U15' => $buteursU15
        ]);
    }
}