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




//        switch ($category){
//            case 'senior-A':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=resultat');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=agenda');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=ranking');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-1&opposant=&place=&sens=&id=339167&poule=1&phase=1&tab=advanced_search&type=ch');
//                $categ = 'Senior A';
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('Senior-A');
//                break;
//            case 'senior-B':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=resultat');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=ranking');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-2&opposant=&place=&sens=&id=339168&poule=3&phase=1&tab=advanced_search&type=ch');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=agenda');
//                $categ = 'Senior B';
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('Senior-B');
//                break;
//            case 'U18':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=resultat');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=ranking');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-4&opposant=&place=&sens=&id=339172&poule=1&phase=1&tab=advanced_search&type=ch');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=agenda');
//                $categ = $category;
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U18');
//                break;
//            case 'U15':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=resultat');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=ranking');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=agenda');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-5&opposant=&place=&sens=&id=339174&poule=1&phase=1&tab=advanced_search&type=ch');
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U15');
//                $categ = $category;
//                break;
//            case 'U13-A':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339179&poule=1&phase=1&type=ch&tab=resultat');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339179&poule=1&phase=1&type=ch&tab=ranking');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339179&poule=1&phase=1&type=ch&tab=agenda');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-6&opposant=&place=&sens=&id=339179&poule=1&phase=1&tab=advanced_search&type=ch');
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U13-A');
//                $categ = 'U13 A';
//                break;
//            case 'U13-B':
//                $resultats = $this->getResults('https://eure.fff.fr/competitions/?id=339179&poule=2&phase=1&type=ch&tab=resultat');
//                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339179&poule=2&phase=1&type=ch&tab=ranking');
//                $agenda = $this->getAgenda('https://eure.fff.fr/competitions/?id=339179&poule=2&phase=1&type=ch&tab=agenda');
//                $calendrier = $this->getCalendrier('https://eure.fff.fr/competitions/?journee=&date=&equipe=104246-18&opposant=&place=&sens=&id=339179&poule=2&phase=1&tab=advanced_search&type=ch');
//                $classementParJournee = $this->getDoctrine()->getManager()->getRepository(StatsParJournee::class)->findByCategOrderByJournee('U13-B');
//                $categ = 'U13 B';
//                break;
//        }

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
        switch ($category){
            case 'senior-A':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339167&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'senior-B':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339168&poule=3&phase=1&type=ch&tab=ranking');
                break;
            case 'U18':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339172&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'U15':
                $classement = $this->getClassement('https://eure.fff.fr/competitions/?id=339174&poule=1&phase=1&type=ch&tab=ranking');
                break;
            case 'U13':
                $classement = $this->getClassement('http://eure.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=329051&ph_no=2&gp_no=2');
                break;
        }

        $em = $this->getDoctrine()->getManager();
        $journee = $this->getDoctrine()->getRepository(StatsParJournee::class)->findLastJourneeByCateg($category);
        if ($journee == null){
            $journee = 1;
        }
        foreach ($classement as $classementInfos){
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