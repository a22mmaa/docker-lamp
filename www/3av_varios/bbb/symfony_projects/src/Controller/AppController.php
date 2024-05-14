<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class AppController extends AbstractController {

    #[Route('/')]
    public function homepage(): Response
    { 
        return new Response("Primera página con Symfony en DWCS");
    }

    #[Route('/a')]
    public function rutaA(): Response
    {
        $produtos = [
            'a' => 1,
            'b' => 2,
            'c' => 3
        ];

        return $this->render('templates-inutiles/a.html.twig', [
            'title' => 'Título A',
            'produtos' => $produtos
        ]); 
    }

    #[Route('/b')]
    public function rutaB(HttpClientInterface $httpClient, CacheInterface $cache): Response
    { 
        $produtos = $cache->get('productos_data', function(ItemInterface $cacheItem) use ($httpClient) {
            $cacheItem->expiresAfter(10);
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
            return $response->toArray();
        });

        // Verificar que $produtos es un array
        if (!is_array($produtos)) {
            throw new \Exception("La respuesta de la API no es un array.");
        }

        return $this->render('templates-inutiles/b.html.twig', [
            'title' => 'b',
            'produtosss' => $produtos
        ]);
    }

    #[Route('/c')]
    public function rutaC(): Response
    { 
        return new Response("Primera página con Symfony en DWCS");
    }
}
