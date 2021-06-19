<?php

namespace App\Controller;
use App\Entity\LockMain;
use App\Entity\LockQuestion;
use App\Form\LockMainType;
use App\Form\LockQuestionType;
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

        // LOCK MAIN
        $lockMain = new LockMain();
        $form = $this->createForm(LockMainType::class, $lockMain);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($lockMain);
            $em->flush();
        }

        $lockMain = $em->getRepository(LockMain::class)->findAll();


        // LOCK QUESTION
        $lockQuestion = new LockQuestion();
        $form2 = $this->createForm(LockQuestionType::class, $lockQuestion);
        $form2->handleRequest($request);

        if($form2->isSubmitted() && $form2->isValid()){
            $em->persist($lockQuestion);
            $em->flush();
        }

        $lockQuestion = $em->getRepository(LockQuestion::class)->findAll();

        return $this->render('lock_main/index.html.twig', [
            'lockMain' => $lockMain,
            'ajout' => $form->createView(),
            'lockQuestion' => $lockQuestion,
            'ajout2' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/admin/lockMain/{id}", name="lockMain_edit")
     */
    public function lockMain(LockMain $lockMain = null, Request $request){
        if($lockMain == null){
            $this->addFlash('danger', 'Non trouvé, essayez avec une autre ID.');
            return $this->redirectToRoute('admin');
        }

        $form = $this->createForm(LockMainType::class, $lockMain);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($lockMain);
            $em->flush();

            $this->addFlash('success', 'Modifié !');
        }

        return $this->render('lock_main/edit.html.twig', [
            'lockMain' => $lockMain,
            'edit' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/lockMain/delete/{id}", name="lockMain_delete")
     */
    public function deleteMain(LockMain $lockMain = null){
        if($lockMain == null){
            $this->addFlash('danger', 'Non trouvé !');
            return $this->redirectToRoute('admin');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($lockMain);
        $em->flush();

        $this->addFlash('success', 'Suppression effectuée !');
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/admin/lockQuestion/edit/{id}", name="lockQuestion_edit")
     */
    public function lockQuestion(LockQuestion $lockQuestion = null, Request $request){
        if($lockQuestion == null){
            $this->addFlash('danger', 'Choix nn trouvé !');
            return $this->redirectToRoute("admin");
        }

        $form2 = $this->createForm(LockQuestionType::class, $lockQuestion);
        $form2->handleRequest($request);

        if($form2->isSubmitted() && $form2->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($lockQuestion);
            $em->flush();

            $this->addFlash('success', 'Choix modifié !');
        }

        return $this->render('lock_main/edit.html.twig', [
            'lockQuestion' => $lockQuestion,
            'edit' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/admin/lockQuestion/delete/{id}", name="lockQuestion_delete")
     */
    public function deleteQuestion(LockQuestion $lockQuestion = null){
        if($lockQuestion == null){
            $this->addFlash('denger', 'Choix non trouvé !');
            return $this->redirectToRoute('admin');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($lockQuestion);
        $em->flush();

        $this->addFlash('success', 'Choix supprimé !');
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/lock", name="lockStart")
     */
    public function lockStart(){
        $this->redirectToRoute('lock', 1);
    }

    /**
     * @Route("/lock/{id}", name="lock")
     */
    public function lock($id)
    {
        $em = $this->getDoctrine()->getManager();

        $lockMain = $em->getRepository(LockMain::class)->findAll();
        $lockQuestion = $em->getRepository(LockQuestion::class)->findAll();

        $etape = $id;

        return $this->render('lock_main/lock.html.twig', [
            'lockMain' => $lockMain,
            'lockQuestion'=> $lockQuestion,
            'etape' => $etape,
        ]);
    }
}
