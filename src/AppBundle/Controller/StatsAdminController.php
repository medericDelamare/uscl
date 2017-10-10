<?php
namespace AppBundle\Controller;


use Sonata\AdminBundle\Controller\CRUDController as Controller;

class StatsAdminController extends Controller{
    public function addAction(){
        return $this->render('@SonataAdmin/Stats/stats.html.twig');
    }
}