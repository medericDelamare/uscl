<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\HistoriqueClassement;
use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsParJournee;
use AppBundle\Service\Category\CategoryFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class StatsController extends Controller
{
    /**
     * @Route("/statistiques/{category}", name="statistiques")
     * @Template()
     */
    public function showAction(Request $request, $category)
    {
        $anneDebutSaison = $this->getParameter('debut_annee');
        $debutSaison = $anneDebutSaison . '-08-15';
        $anneeFinSaison = $this->getParameter('fin_annee');
        $finSaison = $anneeFinSaison . '-08-15';
        $saison = $anneDebutSaison . '-' . $anneeFinSaison;


        $equipes = $this->getLastResults($this->getDoctrine()->getRepository(Equipe::class)->getClassementByCategorie($category, $saison));
        $rencontres = $this->getDoctrine()->getRepository(Rencontre::class)->getDerniereJournee($category, $debutSaison, $finSaison);
        $agendas = $this->getDoctrine()->getRepository(Rencontre::class)->getAgenda($category);
        $calendrier = $this->getDoctrine()->getRepository(Rencontre::class)->getCalendrierParCategorie($category, $debutSaison, $finSaison);
        $distinctEquipes = $this->getDoctrine()->getRepository(Equipe::class)->findByCategorieOrderByNomParse($category, $saison);
        $classementParJournee = $this->getDoctrine()->getRepository(StatsParJournee::class)->findByCategOrderByJournee($category);


        $classementTriParEquipe = [];
        /** @var StatsParJournee $classementInfos */
        foreach ($classementParJournee as $classementInfos){
            $classementTriParEquipe[$classementInfos->getEquipe()->getNomParse()][] = $classementInfos->getPlace();
        }

        $nbJournees = [];
        for ($i = 1; $i<= (count($classementTriParEquipe)-1)*2 ; $i++){
            $nbJournees[] = $i;
        }


        $cormeillesId = null;
        $cormeillesNomParse = null;

        /** @var Equipe $equipe */
        foreach ($distinctEquipes as $equipe){
            if (strstr($equipe->getNomParse(),'CORM')){
                $cormeillesId = $equipe->getId();
                $cormeillesNomParse = $equipe->getNomParse();
            }
        }

        switch ($category){
            case 'seniorA':
                $division = 'Departemental 3';
                $groupe = 'A';
                break;
            case 'seniorB':
                $division = 'Departemental 4';
                $groupe = 'A';
                break;
            case 'veteranA':
                $division = 'CRITERIUM DU MATIN';
                $groupe = 'H';
                break;
            case 'veteranB':
                $division = 'CRITERIUM DU MATIN';
                $groupe = 'G';
                break;
            case 'U18':
                $division = 'Departemental 3';
                $groupe = 'A';
                break;
            case 'U15':
                $division = 'Departemental 3';
                $groupe = 'A';
                break;
            case 'U13A':
                $division = 'Departemental 4';
                $groupe = 'A';
                break;
            case 'U13B':
                $division = 'Departemental 4';
                $groupe = 'B';
                break;
            case 'U18-phase2':
                $division = 'Departemental 3';
                $groupe = 'A';
                break;
            case 'U15-phase2':
                $division = 'Departemental 3';
                $groupe = 'A';
                break;
            case 'U13A-phase2':
                $division = 'Departemental 4';
                $groupe = 'A';
                break;
            case 'U13B-phase2':
                $division = 'Departemental 4';
                $groupe = 'B';
                break;
        }

        $categoryFormat = ucfirst($category);
        $categoryFormat = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $categoryFormat);

        return $this->render(':default:statistiques.html.twig', [
            'class' => 'business-header-' . $category,
            'tableClass' => 'classement-' . $category,
            'categorie' => $categoryFormat,
            'equipes' => $equipes,
            'rencontres' => $rencontres,
            'agendas' => $agendas,
            'calendrier' => $calendrier,
            'equipeListe' => $distinctEquipes,
            'cormeilles_id' => $cormeillesId,
            'cormeilles_nom' => $cormeillesNomParse,
            'classement_par_journee' => $classementTriParEquipe,
            'nb_journees' => $nbJournees,
            'division' => $division,
            'groupe' => $groupe,
            'base_rul' => $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath()
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

    /**
     * @param Equipe[] $equipes
     */
    private function getLastResults($equipes){
        $eq =[];
        foreach ($equipes as $equipe){
            $rencontres = $this->getDoctrine()->getRepository(Rencontre::class)->getLastFiveRencontreByEquipe($equipe);
            $results = [];
            /** @var Rencontre $rencontre */
            foreach ($rencontres as $rencontre){
                if ($equipe->getId() == $rencontre->getEquipeDomicile()->getId()){
                    if ($rencontre->getScoreDom() > $rencontre->getScoreExt()){
                        $results[] = 'v';
                    } elseif ($rencontre->getScoreDom() < $rencontre->getScoreExt()){
                        $results[] = 'd';
                    } else {
                        $results[] = 'n';
                    }
                } elseif ($equipe->getId() == $rencontre->getEquipeExterieure()->getId()){
                    if ($rencontre->getScoreDom() > $rencontre->getScoreExt()){
                        $results[] = 'd';
                    } elseif ($rencontre->getScoreDom() < $rencontre->getScoreExt()){
                        $results[] = 'v';
                    } else {
                        $results[] = 'n';
                    }
                }
            }
            $equipe->setLastFiveResults(array_reverse($results));
            $eq[] = $equipe;
        }
        return $eq;
    }

    /**
     * @param Equipe $equipe
     * @Route("/get-calendrier-par-equipe/{equipe}", name="calendrier-par-equipe")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCalendrierParEquipe(Equipe $equipe){
        $equipes = $this->getDoctrine()->getRepository(Rencontre::class)->getCalendrierParEquipe($equipe);

        return $this->render(':default:tableauCalendrier.html.twig',[
            'equipes' => $equipes
        ]);
    }
}