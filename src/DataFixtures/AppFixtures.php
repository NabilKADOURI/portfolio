<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class AppFixtures extends Fixture
{

    public const PROJECTS = [
        [
            'title' => 'Lamarlonance',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
            'picture' => "lamarlonance.png",
            'link' => "https://github.com/NabilKADOURI/lamarlonance"

        ],
        [
            'title' => 'Dev Agency',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
            'picture' => "dev-agency.PNG",
            'link' => "https://github.com/Dev-AgencyHb/Projet-Co--"
        ],
        [
            'title' => 'Clean Dressing',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
            'picture' => "Clean-dressing.png",
            'link' => "https://github.com/NabilKADOURI/BuisnessCase"
        ],
    ];


    public function load(ObjectManager $manager): void
    {


        foreach (self::PROJECTS as $projectArray) {

            $project = new Project();

            $project->setTitle($projectArray['title'])
                ->setDescription($projectArray['description'])
                ->setPicture($projectArray['picture'])
                ->setLink($projectArray['link']);

            $manager->persist($project);
        } 
        $adminUser = new User();

        $adminUser
            ->setUsername('test')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('test');

        $manager->persist($adminUser);
        
        $faker = \Faker\Factory::create('fr_FR');
        $token = new ApiToken();

        $token
            ->setName($faker->sha256());
        
        $manager->persist($token);

        $manager->flush();
    }
}
