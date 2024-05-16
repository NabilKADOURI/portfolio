<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixture extends Fixture
{
    public const TECHNOLOGY = [
        [
            "name" => "HTML",
            "picture" => "bx bxl-html5 bx-tada-hover bx-lg",
        ],
        [
            "name" => "CSS",
            "picture" => "bx bxl-css3 bx-tada-hover bx-lg",
        ],

        [
            "name" => "Bootstrap",
            "picture" => "bx bxl-bootstrap bx-tada-hover bx-lg",
        ],

        [
            "name" => "Javascript",
            "picture" => "bx bxl-javascript bx-tada-hover bx-lg",
        ],
        [
            "name" => "Angular",
            "picture" => "bx bxl-angular bx-tada-hover bx-lg",
        ],
        [
            "name" => "PHP",
            "picture" => "bx bxl-php bx-tada-hover bx-lg",
        ],
        [
            "name" => "Symfony",
            "picture" => "fa-brands fa-symfony fa-shake",
        ],
        [
            "name" => "wordpress",
            "picture" => "bx bxl-wordpress bx-tada-hover bx-lg",
        ],
       
    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::TECHNOLOGY as $technologyArray) {

            $technology = new Technology();

            $technology->setName($technologyArray['name'])
                ->setPicture($technologyArray['picture']);

            $manager->persist($technology);
        }

        $manager->flush();
    }
}