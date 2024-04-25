<?php


namespace App\DataFixtures;

use App\Entity\Experience;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixture extends Fixture
{

    public const EXPERIENCES = [
        [
            'name' => 'Banque Casino',
             'start_year' => new  DateTime("2008-02-01"),
            //  'end_year' =>  new  DateTime("2010-03-01"),
            'job' => "Conseiller financier",
            'description' =>
            "Commercialisation de solutions financières : revolving, crédit conso, auto, travaux,
                                Déterminer la faisabilité du projet et sa cohérence,
                                Assurer la logistique complète d'un dossier, y compris son suivi et contrôle,
                                Ventes de produits et services additionnelles.
                        ",
            //   "additional_information" =>"lorem",
            //    "picture" => "dev-agency.PNG",
        ],

        [
            'name' => 'Graine de vie',
            'start_year' => new  DateTime("2012-11-01"),
            // 'end_year' => new  DateTime("2023-04-01"),
            'job' => "Chargé d'événements festifs et/ou sportifs",
            'description' => "
                               Gestion administratif, financière et logistique de l'événement,
                               Coordination des équipes internes et externes.
                               
                               Responsable centre de loisirs
                               Conduite de projet transversale avec les autres secteurs,
                              Recrutement, accompagnement, coordination de l'équipe d'animation,
                               Gestion administrative et financière complète.
                       ",
            "additional_information" => "lorem",
            "picture" => "dev-agency.PNG",
        ],

        [
            'name' => 'Human Booster',
               'start_year' => new  DateTime("2023-10-01"),
            //    'end_year' => new  DateTime("2024-10-01"),
            'job' => "Formation de développeur Web",
            'description' => "
                              Conception et réalisation d'interfaces utilisateur,
                              Mise en place de bases de donée relationnelles,
                             Développement de composants PHP / symphony,
                              Communicaton (méthode SCRUM).
                     ",
            // "additional_information" =>"lorem",
            // "picture" => "dev-agency.PNG",
        ],



    ];
    public function load(ObjectManager $manager): void
    {

        foreach (self::EXPERIENCES as $experienceArray) {

            $experience = new Experience();

            $experience->setName($experienceArray['name'])
                
                // ->setEndYear($experienceArray['end_year'])
                ->setJob($experienceArray['job'])
                ->setDescription($experienceArray['description']);
                // ->setAdditionalInformation($experienceArray['additional_information'])
                // ->setPicture($experienceArray['picture']);

            $manager->persist($experience);
        }
        $manager->flush();
    }
}