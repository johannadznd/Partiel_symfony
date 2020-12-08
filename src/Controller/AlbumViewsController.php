<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumViewsController extends AbstractController
{
    /**
     * @Route("/album/views", name="album_views")
     */
    public function index(): Response
    {
        return $this->render('album_views/index.html.twig', [
            'controller_name' => 'AlbumViewsController',
        ]);
    }
}
