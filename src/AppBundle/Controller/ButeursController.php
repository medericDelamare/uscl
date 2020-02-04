<?php

namespace AppBundle\Controller;


use AppBundle\Entity\But;
use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ButeursController extends Controller
{

    private $categoriesSeniorA = ['seniorA'];
    private $categoriesSeniorB = ['seniorB'];
    private $categoriesSeniorF = ['seniorF'];
    private $categoriesSeniorCoupe = ['coupeDeFrance', 'coupeDeNormandie', 'coupeEure', 'coupeReserves'];

    private $categoriesVeteransA = ['veteranA'];
    private $categoriesVeteransB = ['veteranB'];
    private $categoriesVeteransCoupe = ['coupeVeterans'];

    private $categoriesU18 = ['U18', 'U18-phase2'];
    private $categoriesU18Coupe = ['coupeU18'];

    private $categoriesU15 = ['U15', 'U15-phase2'];
    private $categoriesU15Coupe = ['coupeU15'];

    private $categoriesU13A = ['U13A', 'U13A-phase2'];
    private $categoriesU13B = ['U13B', 'U13B-phase2'];
    private $categoriesU13Coupe = ['coupeU13'];



    /**
     * @Route("/buteurs", name="buteurs")
     * @Template()
     */
    public function showAction()
    {
        $buteurs = $this->getDoctrine()->getRepository(But::class)->findAllByCurrentYear($this->container->getParameter('debut_annee') . '-08-15', $this->container->getParameter('fin_annee').'-08-15');

        $buteursSenior=[];
        $buteursSeniorF=[];
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
                $buteursSenior[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesSeniorCoupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursSenior[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransA)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursVeterans[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransB)){
                $buteur->getButeur()->getStats()->incrementButB();
                $buteursVeterans[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesVeteransCoupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursVeterans[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU18)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursU18[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU18Coupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursU18[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU15)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursU15[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU15Coupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursU15[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU13A)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursU13[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU13B)){
                $buteur->getButeur()->getStats()->incrementButB();
                $buteursU13[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesU13Coupe)){
                $buteur->getButeur()->getStats()->incrementButCoupe();
                $buteursU13[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            } elseif (in_array($buteur->getStatsRencontres()->getRencontre()->getEquipeDomicile()->getCategorie(),$this->categoriesSeniorF)){
                $buteur->getButeur()->getStats()->incrementButA();
                $buteursSeniorF[$buteur->getButeur()->getNomComplet()] = $buteur->getButeur();
            }
        }

        return $this->render(':default:buteurs.html.twig', [
            'seniors' => $buteursSenior,
            'seniorsF' => $buteursSeniorF,
            'veterans' => $buteursVeterans,
            'U18' => $buteursU18,
            'U15' => $buteursU15,
            'U13'=> $buteursU13
        ]);
    }
}