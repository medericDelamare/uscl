<?php


namespace AppBundle\Admin;


use AppBundle\Entity\Club;
use Doctrine\DBAL\Types\ArrayType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Sonata\CoreBundle\Form\Type\ImmutableArrayType;

class ClubAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('logo');
    }
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('nom')
            ->add('logo');
    }
}