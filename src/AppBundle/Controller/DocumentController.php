<?php


namespace AppBundle\Controller;


use AppBundle\Entity\But;
use AppBundle\Entity\Rencontre;
use AppBundle\Entity\StatsRencontre;
use AppBundle\Repository\StatsRencontreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class DocumentController extends Controller
{

    /**
     * @Route("/documents/liste", name="document-list")
     */
    public function listAction()
    {
        $route = $this->get('kernel')->getRootDir() . '/Resources/Documents';

        $files = scandir($route);
        $files = array_diff($files, array('.', '..'));

        return $this->render('default/document.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("/documents/download/{nom}/{telecharger}", name="document-download")
     * @param $nom
     * @param bool $telecharger
     * @return BinaryFileResponse
     */
    public function downloadAction($nom, $telecharger = false)
    {
        $path = $this->get('kernel')->getRootDir() . '/Resources/Documents/' . $nom;

        $response = new BinaryFileResponse($path);

        $response->headers->set('Content-Type', 'application/pdf');
        if ($telecharger) {
            $response->setContentDisposition(
                ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                $nom
            );
        } else {
            $response->setContentDisposition(
                ResponseHeaderBag::DISPOSITION_INLINE,
                $nom
            );
        }


        return $response;
    }



}