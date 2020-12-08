<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistViewsController extends AbstractController
{
    /**
     * @Route("/artist/views", name="artist_views")
     */
    public function index(ArtistRepository $artistRepository): Response
    {

        $artists = $artistRepository->findAll();
        return $this->render('artist_views/index.html.twig', [
            'artists' => $artists
        ]);
    }

    
  /**
   * @Route("/artist/{id}", name="artist_item")
   */
  public function product(Artist $artist , ArtistRepository $artistRepository): Response
  {

    $Astyle = $artistRepository->FindByStyle();
    return $this->render('artist_views/artist.html.twig', [
      'artist' => $artist,
      'astyle' =>$Astyle
    ]);
  }
}
