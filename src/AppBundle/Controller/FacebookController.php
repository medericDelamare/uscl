<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookController extends Controller
{
    /**
     * @Route("/facebook/publish", name="facebook-publish")
     */
    public function publishAction(){
        $this->get('app_core.facebook')->poster("Mon premier post depuis Symfony sur cette page");

        return new Response("Post Envoyé");
    }
}