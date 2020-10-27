<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends Controller
{
    /**
     * @Route("/boutique", name="boutique")
     * @Template()
     */
    public function showAction(Request $request)
    {
        return $this->render('default/boutique.html.twig');
    }
}