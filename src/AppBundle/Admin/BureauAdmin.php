<?php

namespace AppBundle\Admin;


use AppBundle\Entity\Licencie;
use AppBundle\Repository\LicencieRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BureauAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->remove('delete');
        $collection->remove('create');
        $collection->remove('export');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('president', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('vicePresident', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('vicePresident2', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('vicePresident3', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('secretaire', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('tresorier', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsablePoleJeunes', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsablePoleSeniors', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableSeniorA', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableSeniorB', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU18', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU15', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU13', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU11', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU9', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
            ->add('responsableU7', EntityType::class,[
                'class' => Licencie::class,
                'query_builder' => function(LicencieRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dirigeant = true');
                }
            ])
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper

            ->addIdentifier('id')
            ->add('president', TextType::class)
            ->add('vicePresident')
            ->add('vicePresident2')
            ->add('vicePresident3')
            ->add('secretaire')
            ->add('tresorier')
            ->add('responsablePoleJeunes')
            ->add('responsablePoleSeniors')
            ->add('responsableSeniorA')
            ->add('responsableSeniorB')
            ->add('responsableU18')
            ->add('responsableU15')
            ->add('responsableU13')
            ->add('responsableU11')
            ->add('responsableU9')
            ->add('responsableU7')
        ;
    }
}