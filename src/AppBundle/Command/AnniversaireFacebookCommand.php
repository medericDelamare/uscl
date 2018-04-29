<?php

namespace AppBundle\Command;


use AppBundle\Entity\Joueur;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnniversaireFacebookCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('anniversaire:facebook')
            ->setDescription('Import des joueurs via la liste extraite de Footclub');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');

        // Getting doctrine manager
        $em = $this->getContainer()->get('doctrine')->getManager();
        $joueurs = $em->getRepository(Joueur::class)->findByBirthdayNow();

        $message = null;
        $noms = null;
        $age = null;

        $now = new \DateTime();

        if (count($joueurs) == 1 ){
            /** @var Joueur $joueur */
            foreach ($joueurs as $joueur){
                $infos = $noms . $joueur->getPrenom() . ' ' . $joueur->getNom() . ' ( ' . $joueur->getCategorie()->getNom();
                $age = $now->format('Y') - $joueur->getDateNaissance()->format('Y');
                $message = '🎂Alerte anniversaire🎂'.PHP_EOL .  PHP_EOL.'L\'USCL souhaite un joyeux anniversaire à ' . $infos . ' ) qui fête aujourd\'hui ses ' . $age . ' ans'.PHP_EOL.PHP_EOL.'⚽🔵⚪';
            }

        } elseif (count($joueurs) > 1){
            $lastJoueur = end($joueurs);
            /** @var Joueur $joueur */
            foreach ($joueurs as $joueur){
                if ($joueur === $lastJoueur){
                    $noms = $noms . 'et ' . $joueur->getPrenom() . ' ' . $joueur->getNom() . ' ( ' . $joueur->getCategorie()->getNom() . ' ) ';
                    $dernierAge = $now->format('Y') - $joueur->getDateNaissance()->format('Y') . ' ans';
                    $age = $age . ' et ' .$dernierAge;
                } else{
                    $noms = $noms . $joueur->getPrenom() . ' ' . $joueur->getNom() . ' ( ' . $joueur->getCategorie()->getNom() . ' ), ';
                    $age = $age . $now->format('Y') - $joueur->getDateNaissance()->format('Y') . ' ans,';
                }

                $message = 'Alerte anniversaire'.PHP_EOL .  PHP_EOL.'L\'USCL souhaite un joyeux anniversaire à ' . $noms . ' ) qui fête respectivement leurs ' . $age . ' ans'.PHP_EOL.PHP_EOL.'⚽🔵⚪';

            }
        }
        $this->getContainer()->get('app_core.facebook')->poster($message);

        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }
}