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

    /**
     * @Route("/compte/edit/{id}", name="compte_edit")
     */
    public function compte(Compte $compte = null, Request $request){
        if($compte == null){
            $this->addFlash('danger', 'compte non trouvé');
            return $this->redirectToRoute('compte');
        }

        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($compte->getMdp() != $compte->getConfirmMdp()){
                $this->addFlash('danger', 'Les mots de passes indiqués sont différents. Veuillez entrer deux mots de passe identiques.');
                return $this->redirectToRoute('compte');
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($compte);
            $em->flush();

            $this->addFlash('success', 'Compte modifié');
        }

        return $this->render('compte/edit.html.twig', [
            'compte' => $compte,
            'edit' => $form->createView(),
        ]);
    }

    /**
     * @Route("compte/delete/{id}", name="compte_delete")
     */
    public function deleteCompte(Compte $compte){
        if($compte == null){
            $this->addFlash('danger', 'Compte non trouvé');
            return $this->redirectToRoute('compte');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($compte);
        $em->flush();

        $this->addFlash('success', 'Compte supprimé');
        return $this->redirectToRoute('compte');
    }
}
