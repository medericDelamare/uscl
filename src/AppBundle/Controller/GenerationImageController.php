<?php


namespace AppBundle\Controller;


use AppBundle\Entity\But;
use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class GenerationImageController extends Controller
{


    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function generateRencontreImage(Request $request, StatsRencontre $statsRencontre, $baseHttp)
    {
        /**
         * @var Rencontre $rencontre
         */
        $rencontre = $statsRencontre->getRencontre();
        $butsToBdd = $this->getDoctrine()->getRepository(But::class)->findByStatsRencontres($rencontre->getStats()->getId());

        $buts = [];
        /**
         * @var But $but
         */
        foreach ($butsToBdd as $but) {
            $buts['buteurs'][$but->getButeur()->getNom() . ' ' . $but->getButeur()->getPrenom()][] = $but->getId();
            if ($but->getPasseur()) {
                $buts['passeurs'][$but->getPasseur()->getNom() . ' ' . $but->getPasseur()->getPrenom()][] = $but->getId();
            }
        }

        $categorie = ucfirst($rencontre->getEquipeDomicile()->getCategorie());
        $categorie = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $categorie);


        $pathToSave = '/home/mdelamare/www/USCL/app/Resources/Documents/Resultats-images/' .
            $rencontre->getEquipeDomicile()->getCategorie() .
            '\\' .
            str_replace(' ', '', $rencontre->getEquipeDomicile()->getNomParse()) .
            '-' .
            str_replace(' ', '', $rencontre->getEquipeExterieure()->getNomParse()) .
            '-J' . $rencontre->getJournee() . '.jpg';



        if (!file_exists($pathToSave)){
            $this->get('knp_snappy.image')->generateFromHtml(
                $this->renderView(':default:score.html.twig', [
                    'rencontre' => $rencontre,
                    'buts' => $buts,
                    'categorie' => $categorie,
                    'baseHttp' => $baseHttp
                ]),
                $pathToSave
            );
            $statsRencontre->setImageGeneree(true);
            $this->getDoctrine()->getManager()->persist($statsRencontre);
            $this->getDoctrine()->getManager()->flush();
        }
    }
}