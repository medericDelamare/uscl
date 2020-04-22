<?php


namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function showAction(Request $request)
    {
        $form = $this->createForm(ContactType::class,null,[
            'action' => $this->generateUrl('contact'),
            'method' => 'POST'
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if($form->isValid()){
                if($this->sendEmail($form->getData())){
                    return $this->redirectToRoute('contact');
                }else{
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render(':default:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    private function sendEmail($data){
        $message = \Swift_Message::newInstance()
            ->setSubject('Mail Contact USCL')
            ->setFrom($data['email'])
            ->setTo('contact@uscl-foot.fr')
            ->setBody($data['message']);
        return $this->get('mailer')->send($message);
    }
}