<?php
namespace AppBundle\Command;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Joueur;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportFootClubCommand extends ContainerAwareCommand
{
    private $categorieBuffer = [];

    private $fileName;

    protected function configure()
    {
        $this
            ->setName('import:footclub:csv')
            ->setDescription('Import des joueurs via la liste extraite de Footclub')
            ->addOption('fileName', null, InputOption::VALUE_REQUIRED);
    }

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->fileName = $input->getOption('fileName');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');

        // Importing CSV on DB via Doctrine ORM
        $this->import($input, $output);

        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }

    protected function import(InputInterface $input, OutputInterface $output)
    {
        // Getting php array of data from CSV
        $data = $this->get($input, $output);

        // Getting doctrine manager
        $em = $this->getContainer()->get('doctrine')->getManager();
        // Turning off doctrine default logs queries for saving memory
        $em->getConnection()->getConfiguration()->setSQLLogger(null);

        // Define the size of record, the frequency for persisting the data and the current index of records
        $size = count($data);
        $batchSize = 20;
        $i = 1;

        // Starting progress
        $progress = new ProgressBar($output, $size);
        $progress->start();

        // Processing on each row of data
        foreach($data as $row) {
            $nom = $row['Nom'];
            $prenom = $row['Prénom'];
            $categorieString = $row['Sous catégorie'];
            $dateNaissanceString = $row['Né(e) le'];
            $numeroLicence = $row['Numéro licence'];
            $lieuNaissance = $row['Lieu de naissance'];
            $voieRue = $row['Voie-rue'];
            $codePostal = $row['Code postal'];
            $ville = $row['Bureau distributeur_1'];
            $portable = $row['Mobile personnel'];
            $mail = $row['Email principal'];





            if (!$categorie = $em->getRepository(Categorie::class)->findOneByNom($categorieString)){
                if (!$categorie = $this->getCategorieFromBuffer($categorieString)){
                    $categorie = new Categorie($categorieString);
                    $this->categorieBuffer[$categorie->getNom()] = $categorie;
                }
            }

            if (!$joueur = $em->getRepository(Joueur::class)->findOneByNumeroLicence($numeroLicence)){
                if (!$joueur = $em->getRepository(Joueur::class)->findOneBy(['nom' => trim($nom), 'prenom' => trim($prenom)])){
                    $joueur = new Joueur();
                    $joueur
                        ->setNom($nom)
                        ->setPrenom($prenom)
                    ;
                }
            }


            $joueur
                ->setCategorie($categorie)
                ->setDateNaissance(\DateTime::createFromFormat('j/m/Y', $dateNaissanceString))
                ->setNumeroLicence($numeroLicence)
                ->setLieuNaissance($lieuNaissance)
                ->setVille($ville)
                ->setMobile($portable)
                ->setMail($mail)
            ;
            $em->persist($joueur);

        }

        // Flushing and clear data on queue
        $em->flush();
        $em->clear();

        // Ending the progress bar process
        $progress->finish();
    }

    protected function get(InputInterface $input, OutputInterface $output)
    {
        // Getting the CSV from filesystem
        $kernel = $this->getContainer()->get('kernel');
        $fileName = $kernel->getRootDir() . '/Resources/Infos_Footclub/' . $this->fileName;

        // Using service for converting CSV to PHP Array
        $converter = $this->getContainer()->get('import.csvtoarray');
        $data = $converter->convert($fileName, ';');
        return $data;
    }

    /**
     * @param $categorieName
     * @return mixed|null
     */
    protected function getCategorieFromBuffer($categorieName)
    {
        $categorie = null;
        if (array_key_exists($categorieName, $this->categorieBuffer)) {
            $categorie = $this->categorieBuffer[$categorieName];
        }
        return $categorie;
    }
}