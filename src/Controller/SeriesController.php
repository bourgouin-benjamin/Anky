<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;

use App\Entity\Genre;
use App\Form\GenreType;

use App\Entity\Series;
use App\Form\SerieType;

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


        // SERIE
        $serie = new Series();
        $formSerie = $this->createForm(SerieType::class, $serie);
        $formSerie->handleRequest($request);

        if($formSerie->isSubmitted() && $formSerie->isValid()){
            $em->persist($serie);
            $em->flush();
        }

        $serie = $em->getRepository(Series::class)->findALl();



        return $this->render('series/index.html.twig', [
            'categorie' => $categorie,
            'ajoutCategorie' => $formCat->createView(),
            'genre' => $genre,
            'ajoutGenre' => $formGen->createView(),
            'serie' => $serie,
            'ajoutSerie' => $formSerie->createView(),
        ]);
    }
}
