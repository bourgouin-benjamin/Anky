<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Entity\Genre;
use App\Form\GenreType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/series", name="series")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();


        // CATEGORIE
        $categorie = new Categorie();
        $formCat = $this->createForm(CategorieType::class, $categorie);
        $formCat->handleRequest($request);

        if($formCat->isSubmitted() && $formCat->isValid()){
            $em->persist($categorie);
            $em->flush();
        }

        $categorie = $em->getRepository(Categorie::class)->findAll();


        // GENRE
        $genre = new Genre();
        $formGen = $this->createForm(GenreType::class, $genre);
        $formGen->handleRequest($request);

        if($formGen->isSubmitted() && $formGen->isValid()){
            $em->persist($genre);
            $em->flush();
        }

        $genre = $em->getRepository(Genre::class)->findAll();

        return $this->render('series/index.html.twig', [
            'categorie' => $categorie,
            'ajoutCategorie' => $formCat->createView(),
            'genre' => $genre,
            'ajoutGenre' => $formGen->createView(),
        ]);
    }
}
