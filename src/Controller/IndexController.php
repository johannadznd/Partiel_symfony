<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use App\Repository\AlbumRepository;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(AlbumRepository $albumRepository, ArtistRepository $artistRepository): Response
    {
        $albums = $albumRepository->FindLast(30);

        return $this->render('index/index.html.twig', [
            'albums'=> $albums,
        ]);
    }
}
