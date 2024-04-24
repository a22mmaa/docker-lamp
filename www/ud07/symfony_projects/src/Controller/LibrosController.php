<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class LibrosController
{

    #[Route('/')]
    public function homepage()
    {
        return new Response('Benvid@!!');
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


}