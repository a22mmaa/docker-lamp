<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;

class LibrosController extends AbstractController
{

    #[Route('/')]
    public function homepage()
    {
        return $this->render('libros/homepage.html.twig', [
            'title' => 'A miña biblioteca',
        ]);
    }

    #[Route('/sobre')]
    public function sobre() {
        return new Response('Aquí estará o about desta páxina');
    }

    #[Route('/explorar/{xenero}')]
    public function explorar(string $xenero = null)
    {
        if ($xenero) {
            $title = u(str_replace('-', ' ', $xenero))->title(true);
        } else {
            $title = 'Todos os xéneros';
        }

        return new Response('Xénero: ' . $title);
    }

    #[Route('/abreviaturas')]
    public function abreviaturas()
    {
        $xeneros = [
            'CMD - Comedia',
            'DRM - Drama',
            'INF - Infantil',
            'POE - Poesía',
            'TIC - Tecnoloxías Información e Comunicación',
            'XVN - Xuvenil',
        ];

        return new Response('Abreviaturas da web');
    }


}