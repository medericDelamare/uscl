<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FIFAController
 * @package AppBundle\Controller
 *
 */
class FIFAController extends Controller
{
    /**
     * @Route("/effectif/{category}", name="effectif")
     * @Template()
     */
    public function inscriptionAction($category){

    }
}