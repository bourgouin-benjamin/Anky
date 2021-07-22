<?php

namespace App\Controller;

use App\Entity\Publications;
use App\Form\PublicationsType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicationController extends AbstractController
{
    /**
     * @Route("/publication", name="publication")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $publi = new Publications();
        $form = $this->createForm(PublicationsType::class, $publi);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hashtag = explode(',', $request->request->get('publications')['hashtag']);
            foreach($hashtag as $h => $v){
                $hashtag[$h] = trim($v);
            }
            $publi->setHashtag(json_encode($hashtag));

            $em->persist($publi);
            $em->flush();

            $this->addFlash('success', 'Publication ajoutée !');
        }

        $publi = $em->getRepository(Publications::class)->findAll();

        return $this->render('publication/index.html.twig', [
            'publi' => $publi,
            'ajout' => $form->createView(),
        ]);
    }

    /**
     * @Route("/publication/{id}", name="une_publication")
     */
    public function edit(Publications $publications = null, Request $request){
        if($publications == null){
            $this->addFlash('danger', 'Publication introuvable.');
            return $this->redirectToRoute('publication');
        }

        $form = $this->createForm(PublicationsType::class, $publications);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $hashtag = explode(',', $request->request->get('publications')['hashtag']);
            foreach($hashtag as $h => $v){
                $hashtag[$h] = trim($v);
            }
            $publications->setHashtag(json_encode($hashtag));

            $em->persist($publications);
            $em->flush();

            $this->addFlash('success', 'Publication modifiée avec succès !');
        }

        return $this->render('publication/edit.html.twig', [
            'publi' => $publications,
            'edit' => $form->createView(),
        ]); 
    }

    /**
     * @Route("publication/delete/{id}", name="delete_publication")
     */
    public function delete(Publications $publications = null){
        if($publications == null){
            $this->addFlash('danger', 'Publication introuvable.');
            return $this->redirectToRoute('publication');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($publications);
        $em->flush();

        return $this->redirectToRoute('publication');

    }
}
