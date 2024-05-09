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
            'title' => 'Inicio',
        ]);
    }

    #[Route('/sobre')]
    public function sobre() {

        $afeccions = [
            'Videoxogos',
            'Programar',
            'Ler',
        ];

        return $this->render('libros/sobre.html.twig', [
            'title' => 'Sobre esta web',
            'nome' => 'Manuel',
            'n_exemplares' => 128,
            'mail' => 'manuel@mail.com',
            'afeccions' => $afeccions,
        ]);
    }

    #[Route('/explorar/{xenero}')]
    public function explorar(string $xenero = null)
    {
        if ($xenero) {
            $title = u(str_replace('-', ' ', $xenero))->title(true);
        } else {
            $title = 'Todos os xéneros';
        }

        return $this->render('libros/xeneros.html.twig', [
            'title' => $title,
            'xenero' => $xenero
        ]);

        return new Response('Xénero: ' . $title);
    }

    #[Route('/abreviaturas')]
    public function abreviaturas()
    {
        $xeneros = [
            'CMD - Comedia',
            'DRM - Drama',
            'INF - Infantil',
            'TIC - Tecnoloxías Información e Comunicación',
            'XVN - Xuvenil',
        ];

        $tipos = [
            ['abreviatura' => 'bade', 'expansion' => 'Banda Deseñada'],
            ['abreviatura' => 'cate', 'expansion' => 'Catálogo de exposición'],
            ['abreviatura' => 'ensa', 'expansion' => 'Ensaio'],
            ['abreviatura' => 'nvl', 'expansion' => 'Novela'],
            ['abreviatura' => 'poes', 'expansion' => 'Poesía'],
        ];

        return $this->render('libros/abreviaturas.html.twig', [
            'title' => 'Abreviaturas da colección',
            'xeneros' => $xeneros,
            'tipos' => $tipos,
        ]);
    }


}