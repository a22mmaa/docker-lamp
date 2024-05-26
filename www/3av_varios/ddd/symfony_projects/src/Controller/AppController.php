<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController {
    #[Route('/')]
    public function homepage(): Response
    { 
        return new Response("Primera página con Symfony en DWCS");
    }
}