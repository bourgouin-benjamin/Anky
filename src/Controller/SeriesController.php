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
            // dd();
            $keywords = explode(',', $request->request->get('serie')['keywords']);
            $serie->setKeywords(json_encode($keywords));

            $em->persist($serie);
            $em->flush();
        }

        $serie = $em->getRepository(Series::class)->findAll();



        return $this->render('series/index.html.twig', [
            'categorie' => $categorie,
            'ajoutCategorie' => $formCat->createView(),
            'genre' => $genre,
            'ajoutGenre' => $formGen->createView(),
            'serie' => $serie,
            'ajoutSerie' => $formSerie->createView(),
        ]);
    }


    /**
     * @Route("/series/categorie/{id}", name="categorie_edit")
     */
    public function categorie(Categorie $categorie = null, Request $request){
        if($categorie == null){
            $this->addFlash('danger', 'Catégorie introuvable');
            return $this->redirectToRoute("series");
        }

        $formCat = $this->createForm(CategorieType::class, $categorie);
        $formCat->handleRequest($request);

        if($formCat->isSubmitted() && $formCat->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            $this->addFlash('success', 'Catégorie modifiée');
        }

        return $this->render('series/edit.html.twig', [
            'categorie' => $categorie,
            'edit' => $formCat->createView(),
        ]);
    }

    /**
     * @Route("/series/genre/{id}", name="genre_edit")
     */
    public function genre(Genre $genre = null, Request $request){
        if($genre == null){
            $this->addFlash('danger', "Aucun genre trouvé");
            return $this->redirectToRoute('series');
        }

        $formGen = $this->createForm(GenreType::class, $genre);
        $formGen->handleRequest($request);

        if($formGen->isSubmitted() && $formGen->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            $this->addFlash('success', 'Genre modifié');
        }

        return $this->render('series/edit.html.twig', [
            'genre' => $genre,
            'edit' => $formGen->createView(),
        ]);
    }

    /**
     * @Route("/series/serie/{id}", name="serie_edit")
     */
    public function serie(Series $serie = null, Request $request){
        if($serie == null){
            $this->addFlash('danger', 'Aucune série trouvée');
            return $this->redirectToRoute('series');
        }

        $formSerie = $this->createForm(SerieType::class, $serie);
        $formSerie->handleRequest($request);

        if($formSerie->isSubmitted() && $formSerie->isValid()){
            $keywords = explode(',', $request->request->get('serie')['keywords']);
            $serie->setKeywords(json_encode($keywords));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            $this->addFlash('success', 'Série modifiée');
        }

        return $this->render('series/edit.html.twig', [
            'serie' => $serie,
            'edit' => $formSerie->createView(),
        ]);
    }

    /**
     * @Route("/series/categorie/delete/{id}", name="categorie_delete")
     */
    public function deleteCategorie(Categorie $categorie = null){
        if($categorie == null){
            $this->addFlash('danger', 'Aucune catégorie trouvée');
            return $this->redirectToRoute('series');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();

        $this->addFlash('success', 'Catégorie supprimée');
        return $this->redirectToRoute('series');
    }

    /**
     * @Route("/series/genre/delete/{id}", name="genre_delete")
     */
    public function deleteGenre(Genre $genre = null){
        if($genre == null){
            $this->addFlash('danger', 'Aucun genre trouvé');
            return $this->redirectToRoute('series');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($genre);
        $em->flush();

        $this->addFlash('success', 'Genre supprimé');
        return $this->redirectToRoute('series');
    }

    /**
     * @Route("/series/serie/delete/{id}", name="serie_delete")
     */
    public function deleteSerie(Series $serie = null){
        if($serie == null){
            $this->addFlash('danger', 'Aucune série trouvée');
            return $this->redirectToRoute('series');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($serie);
        $em->flush();

        $this->addFlash('success', 'Série supprimée');
        return $this->redirectToRoute('series');
    }
}
