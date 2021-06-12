<?php

namespace App\Controller;
use App\Entity\LockMain;
use App\Form\LockMainType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LockMainController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $lockMain = new LockMain();
        $form = $this->createForm(LockMainType::class, $lockMain);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($lockMain);
            $em->flush();
        }

        $lockMain = $em->getRepository(LockMain::class)->findAll();

        return $this->render('lock_main/index.html.twig', [
            'lockMain' => $lockMain,
            'ajout' => $form->createView(),
        ]);
    }
}
