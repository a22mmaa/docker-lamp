<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Psr\Cache\CacheItemInterface;

class AppController extends AbstractController
{
/*
    #[Route('/')]
    public function homepage()
    {
        return $this->render('pets.html.twig', [
            'title' => 'Inicio',
        ]);
    }
    */

    #[Route('/pets')]
    public function listar(HttpClientInterface $httpClient, string $slug = null): Response
    {
        $title = 'Pets';

        $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a22mmaa/docker-lamp/main/www/T3Examen/pets.json');

        $pets = $response->toArray();

        return $this->render('pets.html.twig', [
            'title' => $title,
            'pets' => $pets
        ]);

        return new Response('Titulo: ' . $title);
    }

    #[Route('/petscache')]
    public function fasvs(
        HttpClientInterface $httpClient,
        CacheInterface $cache,
        string $xenero = null
        ): Response
    {
        $title = 'Pets cache';
        $response = $cache->get('pets_data', function(CacheItemInterface $cacheItem) use ($httpClient) {
            $cacheItem->expiresAfter(2);
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a22mmaa/docker-lamp/main/www/T3Examen/pets.json');
            return $response->toArray();
        });

        return $this->render('pets.html.twig', [
            'title' => $title,
            'pets' => $response
        ]);

        return new Response('Xénero: ' . $title);
    }


}