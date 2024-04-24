<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Provider\Lorem;

class AppFixtures extends Fixture
{


    public const PROJECTS = [
        ['title' => 'Lamarlonance',
         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
         'picture' => "/uploads/lamarlonance.PNG",
         'link' => "https://github.com/NabilKADOURI"
        ],
        ['title' => 'Dev Agency',
         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
         'picture' => "/uploads/dev-agency.PNG",
         'link' => "https://github.com/NabilKADOURI"
        ],
        ['title' => 'Clean Dressing',
         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti dicta, hic tenetur ad dolores officiis est architecto nihil veniam reiciendis veritatis, maiores obcaecati pariatur possimus distinctio in at rerum quidem facere consequatur exercitationem rem ut? Atque culpa ipsam accusantium eaque ab vitae illo tempore alias et voluptatibus impedit, nemo odio?",
         'picture' => "/uploads/Clean-dressing.PNG",
         'link' => "https://github.com/NabilKADOURI"
        ],
    ];


    public function load(ObjectManager $manager): void
    {
       

        foreach (self::PROJECTS as $projectArray){
        
            $project = new Project();

            $project->setTitle($projectArray ['title'])
            ->setDescription($projectArray['description'])
            ->setPicture($projectArray['picture'])
            ->setLink($projectArray['link']);
            
            $manager->persist($project); 

        }

        $manager->flush();
    }
}
