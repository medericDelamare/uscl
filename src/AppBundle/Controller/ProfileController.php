<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use AppBundle\Entity\Licencie;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class ProfileController
 * @package AppBundle\Controller
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile/{id}", name="profile")
     * @Template()
     */
    public function profileShowAction($id){
        $joueur = $this->getDoctrine()->getManager()->getRepository(Licencie::class)->find($id);

        /** @var \DateTime $birthDate */
        $birthDate = $joueur->getDateDeNaissance();
        $to   = new \DateTime('today');
        $age = $birthDate->diff($to)->y;



        return $this->render(':default:profil.html.twig', [
            'joueur' => $joueur,
            'age' => $age,
        ]);
    }
}