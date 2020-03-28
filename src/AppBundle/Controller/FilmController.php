<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends Controller
{
    /**
     * @Route("/films", name="film-list")
     */
    public function listAction()
    {
        $route = $this->get('kernel')->getRootDir() . '/../web/films';

        $files = scandir($route);
        $files = array_diff($files, array('.', '..'));

        return $this->render('default/films.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("/films/download/{nom}", name="download-film")
     * @param $nom
     * @return BinaryFileResponse
     */
    public function downloadAction($nom)
    {
        $path = $this->get('kernel')->getRootDir() . '/../web/films/' . $nom;

        $response = new BinaryFileResponse($path);

        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $nom
        );


        return $response;
    }
}