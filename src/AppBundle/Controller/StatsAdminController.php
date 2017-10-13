<?php
namespace AppBundle\Controller;


use AppBundle\Entity\Joueur;
use GuzzleHttp\Psr7\Request;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class StatsAdminController extends Controller{
    public function addAction(){
        $request = $this->getRequest();
        $joueursBdd = $this->getDoctrine()->getManager()->getRepository(Joueur::class)->findAll();

        /** @var Joueur $joueur */
        foreach ($joueursBdd as $joueur){
            $joueurs[$joueur->getNom() . ' - ' . $joueur->getPrenom()] = $joueur;
        }

        $form = $this->createFormBuilder()
            ->add('passeurs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true,
                'required' => false,
            ])
            ->add('buteurs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true,
                'required' => false,
            ])
            ->add('nbMatchs', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true,
                'required' => false,
            ])
            ->add('cartonsJaunes', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true,
                'required' => false,
            ])
            ->add('cartonsRouges', ChoiceType::class, [
                'choices' => $joueurs,
                'multiple' => true,
                'required' => false,
            ])
            ->add('Envoyer', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $task = $form->getData();

            /** @var Joueur $passeur */
            foreach ($task['passeurs'] as $passeur){
                $passeur->setPasses($passeur->getPasses() + 1);
                $em->persist($passeur);
            }

            /** @var Joueur $buteur */
            foreach ($task['buteurs'] as $buteur){
                $buteur->setButs($buteur->getButs() + 1);
                $em->persist($buteur);
            }

            /** @var Joueur $nbMatch */
            foreach ($task['nbMatchs'] as $nbMatch){
                $nbMatch->setNbMatchs($nbMatch->getNbMatchs() + 1);
                $em->persist($nbMatch);
            }

            /** @var Joueur $cartonJ */
            foreach ($task['cartonsJaunes'] as $cartonJ){
                $cartonJ->setCartonsJaunes($cartonJ->getCartonsJaunes() + 1);
                $em->persist($cartonJ);
            }

            /** @var Joueur $cartonR */
            foreach ($task['cartonsRouges'] as $cartonR){
                $cartonR->setCartonsRouges($cartonR->getCartonsRouges() + 1);
                $em->persist($cartonR);
            }

            $em->flush();
            return $this->redirectToRoute('stats_add');
        }
        return $this->render('@SonataAdmin/Stats/stats.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function saveAction(Request $request){
        dump($request);

        return $this->render('@SonataAdmin/Core/dashboard.html.twig', [
        ]);
    }
}