<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/api', name: "api_")]

class ApiController extends AbstractController
{
    #[Route('/projects', name: 'projects')]
    public function projects(ProjectRepository $projectRepository): Response
    {
        return $this->json(
            $projectRepository->findAll(),
            context: ['groups' => 'projects:read']
        );
    }
}