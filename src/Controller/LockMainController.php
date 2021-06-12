<?php

namespace App\Controller;
use App\Entity\LockMain;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LockMainController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('lock_main/index.html.twig', [
            'controller_name' => 'LockMainController',
        ]);
    }
}
