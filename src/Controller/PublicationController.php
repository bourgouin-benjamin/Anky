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
        $form = $this->createForm(Publications::class, $publi);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($publi);
            $em->flush();

            $this->addFlash('success', 'Publication ajoutée !');
        }

        $publi = $em->getRepository(Publications::class)->findAll();

        return $this->render('publications/index.html.twig', [
            'publi' => $publi,
            'ajout' => $form->createView(),
        ]);

    }
}
