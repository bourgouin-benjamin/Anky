<?php

namespace App\Controller;

use App\Entity\Categorie;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/series", name="series")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository(Categorie::class)->findAll();

        return $this->render('series/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
