<?php


namespace AppBundle\Service\Licencie;


use AppBundle\Entity\But;
use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsRencontre;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\KernelInterface;

class LicencieService
{
    private $em;
    private $kernel;
    private $competitionsSenior = ['seniorA', 'seniorB', 'coupeDeFrance', 'coupeReserves', 'coupeDeNormandie', 'coupeEure'];
    private $competitionsVeteran = ['veteranA','coupeVeterans'];
    private $competitionsU18 = ['U18', 'U18-phase2','coupeU18'];
    private $competitionsU15 = ['U15', 'U15-phase2','coupeU15'];
    private $competitionsU13 = ['U13A', 'U13A-phase2','U13B', 'U13B-phase2','coupeU13'];
    private $competitionsSeniorF = ['seniorF'];

    public function __construct(EntityManager $em, KernelInterface $kernel)
    {
        $this->em = $em;
        $this->kernel = $kernel;
    }

    public function getStatistiquesRencontres(Licencie $joueur)
    {
        $stats = [];
        $dateDepart = \DateTime::createFromFormat('Y-m-d', $this->kernel->getContainer()->getParameter('debut_annee') . '-06-15');
        $dateFin = \DateTime::createFromFormat('Y-m-d', $this->kernel->getContainer()->getParameter('fin_annee') . '-06-15');

        $statsRencontres = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreOrderByDate($joueur, $dateDepart, $dateFin);

        /** @var StatsRencontre $statsRencontre */
        foreach ($statsRencontres as $statsRencontre) {
            $nbButs = 0;
            $nbPasses = 0;
            $nbCartonsJ = 0;
            $nbCartonsR = 0;

            /** @var But $but */
            foreach ($statsRencontre->getButs() as $but) {
                if ($but->getButeur() === $joueur) {
                    $nbButs++;
                }
            }

            /** @var But $but */
            foreach ($statsRencontre->getButs() as $but) {
                if ($but->getPasseur() === $joueur) {
                    $nbPasses++;
                }
            }

            foreach ($statsRencontre->getCartonsJaunes() as $cartonsJaune) {
                if ($cartonsJaune === $joueur) {
                    $nbCartonsJ++;
                }
            }

            foreach ($statsRencontre->getCartonsRouges() as $cartonsRouge) {
                if ($cartonsRouge === $joueur) {
                    $nbCartonsR++;
                }
            }

            $stats[$statsRencontre->getRencontre()->getNom()] = [
                'buts' => $nbButs,
                'passes' => $nbPasses,
                'cartonsJ' => $nbCartonsJ,
                'cartonsR' => $nbCartonsR,
                'categorie' => $statsRencontre->getRencontre()->getCategorie()
            ];
        }

        return $stats;
    }

    public function getButeurs(){
        $debutSaison = $this->kernel->getContainer()->getParameter('debut_annee') . '-08-15';
        $finSaison = $this->kernel->getContainer()->getParameter('fin_annee') . '-08-15';

        $rencontresSeniors = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsSenior);
        $rencontresVeterans = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsVeteran);
        $rencontresU18 = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsU18);
        $rencontresU15 = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsU15);
        $rencontresU13 = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsU13);
        $rencontresSeniorsF = $this->em->getRepository(StatsRencontre::class)->getStatsRencontreByCategorie($debutSaison,$finSaison, $this->competitionsSeniorF);

        return [
            'seniors' => $this->computeButeurs($rencontresSeniors),
            'seniorsF' => $this->computeButeurs($rencontresSeniorsF),
            'veterans' => $this->computeButeurs($rencontresVeterans),
            'U18' => $this->computeButeurs($rencontresU18),
            'U15' => $this->computeButeurs($rencontresU15),
            'U13' => $this->computeButeurs($rencontresU13)
        ];
    }

    private function computeButeurs($stats){
        $buteurs = [];
        foreach ($stats as $stat) {
            /** @var Licencie $joueur */
            foreach ($stat->getJoueurs() as $joueur) {
                $joueur->setNbButs(0);
                $joueur->setNbMatchs(0);
            }
        }

        /** @var StatsRencontre $stat */
        foreach ($stats as $stat){
            /** @var Licencie $joueur */
            foreach ($stat->getJoueurs() as $joueur) {
                $joueur->incrementNbMatch();
                $buteurs[$joueur->getNomComplet()]['id'] = $joueur->getId();
                $buteurs[$joueur->getNomComplet()]['nb_matchs'] = $joueur->getNbMatchs();
                /** @var But $but */
                foreach ($stat->getButs() as $but){
                    if ($but->getButeur() === $joueur){
                        $joueur->incrementNbButs();
                        $buteurs[$joueur->getNomComplet()]['nb_buts'] = $joueur->getNbButs();
                    }
                }
            }
        }

        //Retrait des joueurs non buteurs
        foreach ($buteurs as $key => $buteur){
            if (!array_key_exists('nb_buts', $buteur)){
                unset($buteurs[$key]);
            }
        }

        return $buteurs;
    }
}