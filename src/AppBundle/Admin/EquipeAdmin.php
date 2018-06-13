<?php


namespace AppBundle\Admin;


use Doctrine\DBAL\Types\StringType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EquipeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nomParse')
            ->add('nom',null,[])
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Equipe A' => 'seniorA',
                    'Equipe B' => 'seniorB',
                    'U18' => 'U18',
                    'U15' => 'U15',
                    'U13' => 'U13',
                    'Veterans' => 'veterans',
                ]
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom_parse')
            ->add('categorie')
        ;
    }
}