<?php
namespace AppBundle\Admin;

use AppBundle\Entity\CarriereJoueur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\Kernel;

class JoueurAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'nom',
    );

    /**
     * @var Kernel $kernel
     */
    private $kernel;

    /**
     * @param Kernel $kernel
     */
    public function setKernel(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Saison Actuelle')
                ->with('Informations Personelles', ['class' => 'col-md-6'])
                    ->add('nom')
                    ->add('prenom')
                    ->add('mail')
                    ->add('mobile')
                    ->add('dateNaissance', 'sonata_type_date_picker')
                    ->add('lieuNaissance')
                    ->add('numero')
                    ->add('numeroLicence')
                ->end()
                ->with('Statistiques', ['class' => 'col-md-6'])
                    ->add('categorie')
                    ->add('poste', 'choice', [
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => [
                            "Gardien" => "Gardien",
                            "Défenseur" => "Defenseur",
                            "Milieu" => "Milieu",
                            "Attaquant" => "Attaquant",
                        ]
                    ])
                    ->add('nbMatchs')
                    ->add('butsA')
                    ->add('butsB')
                    ->add('butsCoupe')
                    ->add('cartonsJaunes')
                    ->add('cartonsRouges')
                    ->add('buts')
                    ->add('passes')
                ->end()
            ->end()
            ->tab('Carrière')
            ->add('carriere', 'sonata_type_collection', [
                'label' => false,
                'btn_add' => false
            ],[
                'edit' => 'inline',
                'inline' => 'table',
            ])
            ->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
            ->add('categorie')
            ->add('poste');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('prenom')
            ->add('categorie')
            ->add('poste')
            ->add('buts')
            ->add('numeroLicence');
    }
}