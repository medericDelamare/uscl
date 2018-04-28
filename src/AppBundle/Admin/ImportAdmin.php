<?php


namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ImportAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'imports';
    protected $baseRoutePattern = 'imports';

    public function getDashboardActions()
    {
        $actions = parent::getDashboardActions();

        $actions['import'] = array(
            'label'              => 'Ajouter un import',
            'url'                => $this->generateUrl('add'),
            'icon'               => 'import',
            'translation_domain' => 'SonataAdminBundle', // optional
            'template'           => 'SonataAdminBundle:CRUD:dashboard__action.html.twig', // optional
        );

        return $actions;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('add');
        $collection->add('import-joueurs', 'import-joueurs/{fileName}');
        $collection->remove('list');
        $collection->remove('create');
        $collection->remove('edit');
        $collection->remove('show');
        $collection->remove('batch');
        $collection->remove('delete');
        $collection->remove('export');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

    }

    protected function configureListFields(ListMapper $listMapper)
    {

    }
}