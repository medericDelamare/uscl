<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Club;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ResponsablesController extends Controller
{
    /**
     * @Route("/responsables-par-équipe", name="responsables")
     * @Template()
     */
    public function showAction(Request $request)
    {
        $club = $this->getDoctrine()->getManager()->getRepository(Club::class)->find(1);

        return $this->render(':default:responsablesCategories.html.twig', [
            'club' => $club
        ]);
    }
}