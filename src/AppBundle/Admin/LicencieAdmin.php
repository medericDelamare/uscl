<?php


namespace AppBundle\Admin;


use AppBundle\Entity\Licencie;
use AppBundle\Entity\Poste;
use AppBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpKernel\Kernel;

class LicencieAdmin extends AbstractAdmin
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
                    ->add('nom', null, [
                        'label' => 'Nom',
                        ])
                    ->add('prenom', null, [
                        'label' => 'Prenom',
                    ])
                    ->add('email', null, [
                        'label' => 'Email',
                    ])
                    ->add('telephoneDomicile', null, [
                        'label' => 'Téléphone domicile',
                    ])
                    ->add('telephonePortable', null, [
                        'label' => 'Numéro de portable',
                    ])
                    ->add('dateDeNaissance', 'sonata_type_date_picker', [
                        'label' => 'Date de naissance',
                    ])
                    ->add('lieuDeNaissance', null, [
                        'label' => 'Lieu de Naissance',
                    ])
                    ->add('numeroLicence', null, [
                        'label' => 'Numéro de Licence',
                    ])
                ->end()
                ->with('Statistiques', ['class' => 'col-md-6'])
                    ->add('categorie', null, [
                        'label' => 'Catégorie',
                    ])
                    ->add('poste', 'entity', [
                        'label' => 'Poste',
                        'class' => Poste::class
                    ])
                    ->add('joueur')
                    ->add('dirigeant')
                    ->add('educateur')
                ->end()
            ->end()
        ;

    }

    /**
     * @param Licencie $user
     */
    public function preValidate($user)
    {
        parent::preValidate($user);
        $user->setNationalite("Française");

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom', null, [
                'show_filter' => true
            ])
            ->add('prenom', null, [
                'show_filter' => true
            ])
            ->add('poste', null, [
                'show_filter' => true
            ])
            ->add('categorie', null, [
                'show_filter' => true
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('prenom')
            ->add('categorie')
            ->add('poste')
            ->add('numeroLicence');
    }
}