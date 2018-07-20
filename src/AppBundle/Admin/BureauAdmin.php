<?php

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BureauAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('president')
            ->add('vicePresident1')
            ->add('vicePresident2')
            ->add('vicePresident3')
            ->add('secretaire')
            ->add('tresorier')
            ->add('responsableJeunes')
            ->add('responsableSeniors')
            ->add('responsableA')
            ->add('responsableB')
            ->add('responsableU18')
            ->add('responsableU15')
            ->add('responsableU13')
            ->add('responsableU11')
            ->add('responsableU9')
            ->add('responsableU7');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('president')
            ->add('vicePresident1')
            ->add('vicePresident2')
            ->add('vicePresident3')
            ->add('secretaire')
            ->add('tresorier')
            ->add('responsableJeunes')
            ->add('responsableSeniors')
            ->add('responsableA')
            ->add('responsableB')
            ->add('responsableU18')
            ->add('responsableU15')
            ->add('responsableU13')
            ->add('responsableU11')
            ->add('responsableU9')
            ->add('responsableU7');
    }
}