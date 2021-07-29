<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Series;
use App\Entity\Publications;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\DBAL\Driver\Connection;


class DefaultController extends AbstractController
{
    /**
     * @Route("", name="accueil")
     */
    public function connexion(Request $request, Connection $connection) :Response
    {

        if($this->getUser() == null){
            return $this->redirectToRoute('welcome');
        }

        return $this->redirectToRoute("mon-compte");
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(Connection $connection){
        return $this->render('default/welcome.html.twig');
    }

    /**
     * @Route("/anky", name="mon-compte")
     */
    public function monCompte(Request $request,Connection $connection){
        $em = $this->getDoctrine()->getManager();
        
        $user = $this->getUser();
        $serie = $em->getRepository(Series::class)->findAll();


        return $this->render('default/index.html.twig', [
            'user' => $user,
            'serie' => $serie,
        ]);
    }

    /**
     * @Route("/social-media", name="social-media")
     */
    public function social(){
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $publi = $em->getRepository(Publication::class)->findAll();

        return $this->render('pubication/index.html.twig', [
            'user' => $user,
            'publi' => $publi
        ]);
    }

    /**
     * @Route("/anky/{id}", name="bloquer")
     */
    public function bloquer(Series $serie = null){
        if($serie == null){
            $this->addFlash('danger', 'Aucune série trouvée');
            return $this->redirectToRoute('mon-compte');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();


        // Bloquer les mots-clés
        $keywords = $user->getKeywordsBloque();

        foreach ($serie->getKeywords() as $kw) {
            if($keywords == ''){
                $keywords = [$kw];
            }
            else{
                if(!in_array($kw, $keywords)){
                    array_push($keywords, $kw);
                }
            }
        }

        $user->setKeywordsBloque(json_encode(array_values($keywords)));


        // Bloquer le nom de la série
        $seriesBloque = $user->getSeriesBloque();
        $thisSerie = $serie->getNom();

        if($seriesBloque == ''){
            $seriesBloque = [$thisSerie];
        }
        else{
            if(!in_array($thisSerie, $seriesBloque)){
                array_push($seriesBloque, $thisSerie);
            }
        }

        $user->setSeriesBloque(json_encode(array_values($seriesBloque)));



        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'Série bloquée avec succès');

        return $this->redirectToRoute('details-serie', ['id' => $serie->getId()]);
    }

    /**
     * @Route("/anky/unlock/{id}", name="debloquer")
     */
    public function debloquer(Series $serie = null){
        if($serie == null){
            $this->addFlash('danger', 'Aucune série trouvée');
            return $this->redirectToRoute('mon-compte');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();


        // Débloquer les mots-clés
        $keywords = $user->getKeywordsBloque();

        foreach ($serie->getKeywords() as $kw) {
            $keywords = array_diff($keywords, array($kw));
        }

        $user->setKeywordsBloque(json_encode(array_values($keywords)));


        // Débloquer la série 
        $seriesBloque = $user->getSeriesBloque();
        $thisSerie = $serie->getNom();

        $seriesBloque = array_diff($seriesBloque, array($thisSerie));

        $user->setSeriesBloque(json_encode(array_values($seriesBloque)));

        $em->persist($user);
        $em->flush();

        $this->addFlash('danger', 'La série n\'est désormais plus bloquée... Attention aux spoils !');

        return $this->redirectToRoute('details-serie', ['id' => $serie->getId()]);
    }
}
