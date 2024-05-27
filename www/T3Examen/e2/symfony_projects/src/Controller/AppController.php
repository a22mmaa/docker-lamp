<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;

class AppController extends AbstractController
{
/*
    #[Route('/')]
    public function homepage()
    {
        return $this->render('base.html.twig', [
            'title' => 'Inicio',
        ]);
    }
    */

    #[Route('/pets')]
    public function mostrarDatos()
    {
        return $this->render('base.html.twig', [
            'title' => 'Inicio',
        ]);
    }


}