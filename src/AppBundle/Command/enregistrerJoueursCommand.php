<?php


namespace AppBundle\Command;


use AppBundle\Entity\Licencie;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class enregistrerJoueursCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('enregistrer:joueurs')
            ->setDescription('Récupération des joueurs');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $curl_request = curl_init("http://37.187.1.105:84/api/users/2018");

        curl_setopt($curl_request, CURLOPT_HEADER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $data = json_decode($result, true);

        $compteur = 0;
        foreach ($data as $joueur) {
            if ($joueur['permits'][0]['state'] == 'Validée'){
                $licencie = new Licencie();

                $simpleDate = explode('T',$joueur['birthday']['date']);
                
                $licencie
                    ->setNumeroLicence((integer)$joueur['id'])
                    ->setCategorie('test')
                    ->setNom($joueur['lastName'])
                    ->setPrenom($joueur['firstName'])
                    ->setNationalite($joueur['nationality'])
                    ->setDateDeNaissance(\DateTime::createFromFormat('Y-m-d', $simpleDate[0]))
                    ->setLieuDeNaissance($joueur['birthday']['birthPlace'])
                    ->setAdresse($joueur['address']['city'])
                    ->setJoueur(true)
                    ->setDirigeant(true)
                    ->setEducateur(true);

                $doctrine = $this->getContainer()->get('doctrine');
                $em = $doctrine->getManager();
                $em->persist($licencie);
                $em->flush();

            }
        }

        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }
}