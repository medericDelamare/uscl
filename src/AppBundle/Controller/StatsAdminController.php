<?php
namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StatsAdminController extends Controller{
    public function addAction(){

        $joueursBdd = $this->getDoctrine()->getManager()->getRepository(Joueur::class)->findAll();

        /** @var Joueur $joueur */
        foreach ($joueursBdd as $joueur){
            $joueurs[$joueur->getNom() . ' - ' . $joueur->getPrenom()] = $joueur;
        }

        $form = $this->createFormBuilder()
            ->add('passeurs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true
            ])
            ->add('buteurs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true
            ])
            ->add('nbMatchs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true
            ])
            ->add('Envoyer', SubmitType::class)
            ->getForm();
        return $this->render('@SonataAdmin/Stats/stats.html.twig', [
            'form' => $form->createView()
        ]);
    }
}