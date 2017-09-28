<?php

namespace AppBundle\Controller;


use AppBundle\Entity\HistoriqueClassement;
use AppBundle\Entity\StatsParJournee;
use AppBundle\Service\Category\CategoryFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;

class StatsController extends Controller
{
    /**
     * @Route("/statistiques/{category}", name="statistiques")
     * @Template()
     */
    public function showAction($category)
    {
        $factory = CategoryFactory::getInstance($this->getDoctrine()->getManager());
        $instance = $factory->createInstance($category);

        $historiques = $this->getDoctrine()->getManager()->getRepository(HistoriqueClassement::class)->findAll();
        foreach ($historiques as $historique){
            $annees[] = $historique->getAnnee();
            $points[] = $historique->getNbPoints();
            $positions[] = $historique->getPosition();
        }

        $classementTriParEquipe = [];
        /** @var StatsParJournee $classement */
        foreach ($instance->getClassementParJournee() as $classementInfos){
            $classementTriParEquipe[$classementInfos->getEquipe()][] = $classementInfos->getPlace();
        }

        $nbjournees = [];
        for ($i = 1; $i<= (count($classementTriParEquipe)-1)*2 ; $i++){
            $nbjournees[] = $i;
        }

        return $this->render(':default:statistiques.html.twig', [
            'agendas' => $instance->getAgenda() ,
            'resultats' => $instance->getResults(),
            'classement' => $instance->getClassement(),
            'calendrier' => $instance->getCalendrier(),
            'categorie' => $category,
            'annees' => $annees,
            'points' => $points,
            'positions' => $positions,
            'classement_par_journee' => $classementTriParEquipe,
            'nb_journees' => $nbjournees,
            'category' => $category
        ]);
    }

    /**
     * @Route("/save-classement/{category}", name="save-classement")
     * @Template()
     */
    public function saveClassementAction($category){
        $factory = CategoryFactory::getInstance($this->getDoctrine()->getManager());
        $instance = $factory->createInstance($category);

        $em = $this->getDoctrine()->getManager();
        $journee = $this->getDoctrine()->getRepository(StatsParJournee::class)->findLastJourneeByCateg($category);
        if ($journee == null){
            $journee = 1;
        }
        foreach ($instance->getClassement() as $classementInfos){
            $statsParjournee = new StatsParJournee();
            $statsParjournee->setCategory($category);
            $statsParjournee->setEquipe(trim($classementInfos['equipe']));
            $statsParjournee->setJournee($journee['journee']+1);
            $statsParjournee->setPlace($classementInfos['place']);
            $em->persist($statsParjournee);
        }

        $em->flush();
        return $this->showAction($category);
    }
}