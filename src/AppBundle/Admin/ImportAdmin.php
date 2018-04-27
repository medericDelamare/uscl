<?php


namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class ImportAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'import';
    protected $baseRoutePattern = 'import';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('import','import/{fileName}');
    }
}