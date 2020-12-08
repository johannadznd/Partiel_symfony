<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Style;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)

  {
      $this->passwordEncoder = $passwordEncoder;
  }

    public function load(ObjectManager $manager)
    {

        $style = new Style();
        $style
            ->setName('Mon style');

        $manager->persist($style);


        $artist = new Artist();
        $artist
            ->setName('test')
            ->setPicture('test.png')
            ->setStyle($style);

        $manager->persist($artist);


       

        $album = new Album();
        $album
            ->setName('Mon album')
            ->setReleaseYear(2018)
            ->setCover('test.png')
            ->setArtist($artist);

        $manager->persist($album);


        $User = new User();
        $User
          ->setLogin('Test')
          ->setPassword($this->passwordEncoder->encodePassword($User,'test'))
          ->setRoles(['ROLE_ADMIN'],);
        $manager->persist($User);


        $manager->flush();
    }
}
