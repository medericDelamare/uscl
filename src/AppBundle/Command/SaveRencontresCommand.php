<?php

namespace AppBundle\Command;

use AppBundle\Entity\Club;
use AppBundle\Entity\Rencontre;
use AppBundle\Model\Scorenco\Championnat;
use AppBundle\Model\Scorenco\Equipe;
use AppBundle\Model\Scorenco\Journee;
use AppBundle\Model\Scorenco\Match;
use Doctrine\ORM\EntityManager;
use PhpOffice\PhpSpreadsheet\Calculation\DateTime;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SaveRencontresCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('save:rencontres')
            ->addArgument('categorie', InputArgument::REQUIRED, 'Categorie?')
            ->setDescription('Récupération des données via Scorenco');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scorencoService = $this->getContainer()->get('scorenco.scorenco_service');
        $doctrine = $this->getContainer()->get('doctrine');
        /** @var EntityManager $em */
        $em = $doctrine->getManager();

        $categorie = $input->getArgument('categorie');
        $competitionId = $this->getContainer()->getParameter("competitionId_" . $categorie);

        $nbEquipes = count($scorencoService->getDisctinctTeams("https://scorenco.com/backend/v1/competitions/" . $competitionId . "/rankings/"));
        for ($i = 1; $i <= ($nbEquipes - 1) * 2; $i++) {
            /** @var Championnat $championnat */
            $championnat = $scorencoService->getJourneeByUrl("https://scorenco.com/backend/v1/competitions/" . $competitionId . "/events/?roundRank=" . $i);
            /** @var Journee $round */
            foreach ($championnat->getRounds() as $round) {

                /** @var Match $event */
                foreach ($round->getEvents() as $event) {
                    if (!$rencontre = $em->getRepository(Rencontre::class)->findOneByIdScorenco($event->getId())) {
                        $rencontre = new Rencontre();
                    }


                    /** @var Equipe $teamDom */
                    $teamDom = $event->getTeams()[0];
                    /** @var Equipe $teamExt */
                    $teamExt = $event->getTeams()[1];

                    $equipeDom = $em->getRepository(\AppBundle\Entity\Equipe::class)->findByCategorieAndCodeScorenco($categorie, $teamDom->getTeamSlug());
                    $equipeExt = $em->getRepository(\AppBundle\Entity\Equipe::class)->findByCategorieAndCodeScorenco($categorie, $teamExt->getTeamSlug());


                    if (!$equipeDom) {
                        $equipeDom = $this->createEquipe($categorie, $teamDom, $em, $scorencoService);
                    }

                    if (!$equipeExt) {
                        $equipeExt = $this->createEquipe($categorie, $teamExt, $em, $scorencoService);
                    }

                    if (!$rencontre->getIdScorenco()) {
                        $rencontre
                            ->setEquipeDomicile($equipeDom)
                            ->setEquipeExterieure($equipeExt);
                    }

                    $rencontre
                        ->setJournee($round->getRank())
                        ->setIdScorenco($event->getId())
                        ->setDate($this->getDate($event->getDate()));

                    if ($teamDom->getScore() !== null) {
                        $rencontre->setScore($teamDom->getScore() . '-' . $teamExt->getScore());
                        $rencontre->setScoreDom($teamDom->getScore());
                        $rencontre->setScoreExt($teamExt->getScore());
                    }

                    $em->persist($rencontre);
                    $em->flush();
                }
            }
        }
    }

    private function getDate($scorencoDate)
    {
        $datetime = new \DateTime($scorencoDate);
        $datetime->setTimezone(new \DateTimeZone("Europe/Paris"));
        return $datetime;
    }

    private function createEquipe($categorie, $team, $em, $scorencoService){
        $equipe = new \AppBundle\Entity\Equipe();
        $equipe
            ->setNom($team->getName())
            ->setNomParse($team->getName())
            ->setCodeScorenco($team->getTeamSlug())
            ->setCategorie($categorie);

        if (!$club = $em->getRepository(Club::class)->findOneByScorencoId($team->getClubId())) {
            /** @var \AppBundle\Model\Scorenco\Club $clubInfos */
            $clubInfos = $scorencoService->getClubInfoBySlug($team->getClubSlug());
            /** @var Club $club */
            $club = new Club();
            $club
                ->setNom($clubInfos->getName())
                ->setScorencoId($clubInfos->getId())
                ->setLogo('none.png');

            $em->persist($club);
            $em->flush($club);
        }

        $equipe->setClub($club);
        $em->persist($equipe);
        $em->flush($equipe);

        return $equipe;
    }
}