<?php

namespace AppBundle\Admin;


use AppBundle\Entity\Equipe;
use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StatsRencontreAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $container = $this->getConfigurationPool()->getContainer();

        $debutDate = $container->getParameter('debut_annee') . '-06-15';
        $finDate = $container->getParameter('fin_annee') . '-06-15';

        if ($this->isCurrentRoute('create')) {
            $formMapper
                ->add('rencontre', EntityType::class,[
                    'label' => 'Rencontre',
                    'class' => Rencontre::class,
                    'query_builder' => function (EntityRepository $er) use ($debutDate, $finDate) {

                        return $er->createQueryBuilder('r')
                            ->join(Equipe::class, 'ed', 'WITH', 'ed.id = r.equipeDomicile')
                            ->join(Equipe::class, 'ee', 'WITH', 'ee.id = r.equipeExterieure')
                            ->leftJoin(StatsRencontre::class, 'sr', 'WITH', 'sr.rencontre = r.id')
                            ->where('ed.club = 1 OR ee.club = 1')
                            ->andWhere('r.date > :debutDate')
                            ->andWhere('r.date < :finDate')
                            ->andWhere('sr.rencontre IS NULL')
                            ->setParameters([
                                'debutDate' => $debutDate,
                                'finDate' => $finDate
                            ])
                            ;


                    }
                ]);
        }
        else {
            $formMapper
                ->add('rencontre', EntityType::class,[
                    'label' => 'Rencontre',
                    'class' => Rencontre::class,
                    'query_builder' => function (EntityRepository $er) use ($debutDate, $finDate) {

                        return $er->createQueryBuilder('r')
                            ->join(Equipe::class, 'ed', 'WITH', 'ed.id = r.equipeDomicile')
                            ->join(Equipe::class, 'ee', 'WITH', 'ee.id = r.equipeExterieure')
                            ->where('ed.club = 1 OR ee.club = 1')
                            ->andWhere('r.date > :debutDate')
                            ->andWhere('r.date < :finDate')
                            ->setParameters([
                                'debutDate' => $debutDate,
                                'finDate' => $finDate
                            ])
                            ;


                    }
                ]);
        }
        $formMapper
            ->add('joueurs')
            ->add('cartonsJaunes')
            ->add('cartonsRouges')
            ->add('buts', 'sonata_type_collection', [
                'by_reference' => false,
                'label' => false,
                'btn_add' => 'Ajouter un buteur'
            ],[
                'edit' => 'inline',
                'inline' => 'table',
            ])
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('id')
            ->add('rencontre')
        ;
    }
}