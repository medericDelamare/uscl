<?php


namespace AppBundle\Command;


use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;

class GenerateScoreImageCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('generate-score-image')
            ->setDescription('Génération des images de score')
            ->addArgument('baseHttp', InputArgument::REQUIRED, 'BaseHttp?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $baseHttp = $input->getArgument('baseHttp');
        $now = new \DateTime();
        $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');


        $doctrine = $this->getContainer()->get('doctrine');
        $statsRencontres = $doctrine->getRepository(StatsRencontre::class)->getStatsRencontreSansImage();

        /**
         * @var StatsRencontre $statsRencontre
         */
        foreach ($statsRencontres as $statsRencontre) {
            $service = $this->getContainer()->get('app.generation_image_controller');
            $service->generateRencontreImage(Request::createFromGlobals(), $statsRencontre,$baseHttp);
        }
        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }
}