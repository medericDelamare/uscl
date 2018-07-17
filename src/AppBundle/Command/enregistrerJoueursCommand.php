<?php


namespace AppBundle\Command;


use AppBundle\Entity\CarriereJoueur;
use AppBundle\Entity\Licencie;
use AppBundle\Entity\StatsJoueur;
use Doctrine\Common\Collections\ArrayCollection;
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
        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        $curl_request = curl_init("http://37.187.1.105:84/api/users/2018");

        curl_setopt($curl_request, CURLOPT_HEADER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $data = json_decode($result, true);

        $nbCreation = 0;
        $nbMaj = 0;
        foreach ($data as $joueur) {
            if ($joueur['permits'][0]['state'] == 'Validée'){
                $doctrine = $this->getContainer()->get('doctrine');
                $em = $doctrine->getManager();

                if (!$licencie = $em->getRepository(Licencie::class)->findOneByNumeroLicence((integer)$joueur['id'])){
                    $licencie = new Licencie();
                }

                $licencie->getId() ? $nbMaj ++ : $nbCreation ++;

                $simpleDate = explode('T',$joueur['birthday']['date']);

                array_key_exists('Mobile personnel', $joueur['contacts']) ? $mobile = $joueur['contacts']['Mobile personnel'] :$mobile = null;
                array_key_exists('Email principal', $joueur['contacts']) ? $email = $joueur['contacts']['Email principal'] : $email = null;
                array_key_exists('Téléphone domicile', $joueur['contacts']) ? $fixe = $joueur['contacts']['Téléphone domicile'] : $fixe = null;

                $licencie
                    ->setNumeroLicence((integer)$joueur['id'])
                    ->setCategorie($this->getCategorie($joueur))
                    ->setNom($joueur['lastName'])
                    ->setPrenom($joueur['firstName'])
                    ->setNationalite($joueur['nationality'])
                    ->setDateDeNaissance(\DateTime::createFromFormat('Y-m-d', $simpleDate[0]))
                    ->setLieuDeNaissance(ucfirst($joueur['birthday']['birthPlace']))
                    ->setAdresse($joueur['address']['city'])
                    ->setPhoto($joueur['photo']['link'])
                    ->setTelephoneDomicile($fixe)
                    ->setTelephonePortable($mobile)
                    ->setEmail($email)
                    ->setJoueur($this->isJoueur($joueur))
                    ->setDirigeant($this->isDirigeant($joueur))
                    ->setEducateur($this->isEducateur($joueur));

                foreach ($licencie->getCarriere() as $carriereJoueur){
                    $em->remove($carriereJoueur);
                }

                $em->flush();

                $carriereParSaison = [];

                foreach ($joueur['permits'] as $licence){
                    $carriereParSaison[substr($licence['startSeason'],0,4) . '-' . substr($licence['endSeason'],0,4)][$licence['club']['name']][]=$licence['subCategory'];
                }

                foreach ($carriereParSaison as $annee => $clubArray){
                    $carriere = new CarriereJoueur();
                    $carriere
                        ->setSaison($annee);
                    foreach ($clubArray as $club => $categArray){
                        $carriere
                            ->setClub($club);
                        foreach ($categArray as $key => $categ){
                            if ($carriere->getSousCategorie()){
                                $carriere
                                    ->setSousCategorie($carriere->getSousCategorie() . ' - '  . $categ);
                            } else {
                                $carriere
                                    ->setSousCategorie($categ);
                            }
                        }
                    }
                    $licencie->addCarriere($carriere);
                }

                if ($licencie->isJoueur()){
                    $stats = new StatsJoueur();
                    $licencie->setStats($stats);
                }
                $em->persist($licencie);
                $em->flush();
            }
        }


        $output->writeln('<comment>Il y a ' . $nbCreation . ' créations et '. $nbMaj .' MAJ ---</comment>');

        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }

    private function isJoueur($joueur){
        foreach ($joueur['permits'] as $licence){
            if ('2018' ==  substr($licence['startSeason'],0,4) && strpos($licence['subCategory'],'Libre') !== false){
                return true;
            }
        }

        return false;
    }

    private function isDirigeant($joueur){
        foreach ($joueur['permits'] as $licence){
            if ('2018' ==  substr($licence['startSeason'],0,4) && strpos($licence['subCategory'],'Dirigeant') !== false){
                return true;
            }
        }

        return false;
    }

    private function isEducateur($joueur){
        foreach ($joueur['permits'] as $licence){
            if ('2018' ==  substr($licence['startSeason'],0,4) && strpos($licence['subCategory'],'Educateur') !== false){
                return true;
            }
        }

        return false;
    }

    private function getCategorie($joueur){
        foreach ($joueur['permits'] as $licence){
            if ('2018' ==  substr($licence['startSeason'],0,4) && strpos($licence['subCategory'],'Libre') !== false){
                return $licence['subCategory'];
            }
        }
    }
}