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
        // Create the form according to the FormType created previously.
        // And give the proper parameters
        $form = $this->createForm(ContactType::class,null,[
            // To set the action use $this->generateUrl('route_identifier')
            'action' => $this->generateUrl('contact'),
            'method' => 'POST'
        ]);

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if($form->isValid()){
                // Send mail
                if($this->sendEmail($form->getData())){

                    // Everything OK, redirect to wherever you want ! :

                    return $this->redirectToRoute('redirect_to_somewhere_now');
                }else{
                    // An error ocurred, handle
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render(':default:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    private function sendEmail($data){
        $myappContactMail = 'contact@uscl-foot.fr';
        $myappContactPassword = null;

        // In this case we'll use the ZOHO mail services.
        // If your service is another, then read the following article to know which smpt code to use and which port
        // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
        $transport = \Swift_SmtpTransport::newInstance('localhost', 1025,null);

        //dump($transport);die;

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance("Test")
            ->setFrom(array($myappContactMail => "Message by ".$data["nom"]))
            ->setTo(array(
                $myappContactMail => $myappContactMail
            ))
            ->setBody($data["message"]."<br>ContactMail :".$data["email"]);

        return $mailer->send($message);
    }
}