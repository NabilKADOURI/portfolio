<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Project;
use App\Form\ContactType;
use App\Mail\ContactService;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function list(ProjectRepository $projectRepository, Request $request, EntityManagerInterface $em, ContactService $contactService): Response
    {
        $projects = $projectRepository->findAll();

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setDate(new \DateTime());
            $em->persist($contact);
            $em->flush();

           $contactService->sendConfirmation($contact);

            $this->addFlash('success', 'Votre demande à bien été prise en compte !');
            return $this->redirectToRoute('home');
        }

        return $this->render('index/index.html.twig', [
            'projects' => $projects,
            'contactForm' => $form,
        ]);
    }


    #[Route('/projects/{id}', name: 'app_project')]
    public function project(Project $project): Response
    {
        return $this->render('projects/projectSingle.html.twig', [
            'project' => $project
        ]);
    }
}
