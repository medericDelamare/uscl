<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ButeursController extends Controller
{
    /**
     * @Route("/buteurs", name="buteurs")
     * @Template()
     */
    public function showAction()
    {
        $licencieService = $this->get('licencie.licencie_service');

        return $this->render('default/buteurs.html.twig', $licencieService->getButeurs());
    }
}