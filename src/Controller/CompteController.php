<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            if($compte->getMdp() != $compte->getConfirmMdp()){
                $this->addFlash('danger', 'Les mots de passes indiqués sont différents. Veuillez entrer deux mots de passe identiques.');
                return $this->redirectToRoute('compte');
            }

            $em->persist($compte);
            $em->flush();
            
            $this->addFlash('success', 'Compte ajouté');
        }

        $compte = $em->getRepository(Compte::class)->findAll();

        return $this->render('compte/index.html.twig', [
            'compte' => $compte,
            'ajout' => $form->createView(),
        ]);
    }
}
