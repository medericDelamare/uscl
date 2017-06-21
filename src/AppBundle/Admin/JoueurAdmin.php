<?php
namespace AppBundle\Admin;

use AppBundle\Entity\CarriereJoueur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class JoueurAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Saison Actuelle')
                ->with('Informations Personelles', ['class' => 'col-md-6'])
                    ->add('nom')
                    ->add('prenom')
                    ->add('mail')
                    ->add('mobile')
                    ->add('dateNaissance')
                    ->add('lieuNaissance')
                    ->add('numero')
                    ->add('numeroLicence')
                ->end()
                ->with('Statistiques', ['class' => 'col-md-6'])
                    ->add('categorie')
                    ->add('poste')
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
                'btn_add' => 'Ajouter un bloc'
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
            ->add('buts');
    }
}