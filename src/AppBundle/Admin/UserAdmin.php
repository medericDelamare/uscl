<?php
/**
 * Created by PhpStorm.
 * User: delamare
 * Date: 11/08/2017
 * Time: 19:12
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class UserAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('roles', 'choice', [
            'expanded' => true,
            'multiple' => true,
            'choices' => [
                "Utilisateur" => "ROLE_USER",
                "Administrateur" => "ROLE_ADMIN",
            ],
            'label' => 'Roles'
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email')
            ->add('roles')
            ->add('username');
    }
}