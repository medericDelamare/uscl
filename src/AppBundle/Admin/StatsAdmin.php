<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class StatsAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'stats';
    protected $baseRoutePattern = 'stats';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('add');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

    }

    protected function configureListFields(ListMapper $listMapper)
    {

    }
}