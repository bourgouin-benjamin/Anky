<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\ConnexionType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\DBAL\Driver\Connection;


class DefaultController extends AbstractController
{
    /**
     * @Route("", name="connexion")
     */
    public function connexion(Request $request, Connection $connection) :Response
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ConnexionType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        }


        return $this->render('default/index.html.twig', [
            'connexion' => $form->createView(),
        ]);
    }
}
