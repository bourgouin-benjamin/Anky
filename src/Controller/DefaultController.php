<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Series;

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
            return $this->redirectToRoute('app_login');
        }

        return $this->redirectToRoute("mon-compte");
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
     * @Route("/anky/{id}", name="bloquer")
     */
    public function bloquer(Series $serie = null){
        if($serie == null){
            $this->addFlash('danger', 'Aucune série trouvée');
            return $this->redirectToRoute('mon-compte');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $keywords = '';

        foreach ($serie->getKeywords() as $kw) {
            $keywords == '' ?
                $keywords .= $kw
            :
                $keywords .= ','.$kw;
        }

        $keywordsBloque = explode(',', $keywords);

        $user->setKeywordsBloque(json_encode($keywordsBloque));

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('mon-compte');
    }
}
