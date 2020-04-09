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
}