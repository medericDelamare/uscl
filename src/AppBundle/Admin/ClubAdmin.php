<?php


namespace AppBundle\Admin;


use AppBundle\Entity\Club;
use Doctrine\DBAL\Types\ArrayType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Sonata\CoreBundle\Form\Type\ColorSelectorType;
use Sonata\CoreBundle\Form\Type\ImmutableArrayType;
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;

class ClubAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('logo')
            ->add('couleurPrincipale', ColorPickerType::class, [
                'required' => false
            ])
            ->add('couleurSecondaire', ColorPickerType::class, [
                'required' => false
            ]);
    }
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('nom')
            ->add('logo');
    }
}