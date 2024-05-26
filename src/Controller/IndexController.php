<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Experience;
use App\Entity\Project;
use App\Event\MailRegisteredEvent;
use App\Form\ContactType;
use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function list(ProjectRepository $projectRepository, ExperienceRepository $experienceRepository, Request $request, EntityManagerInterface $em,  EventDispatcherInterface $dispacher): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setDate(new \DateTime());
            $em->persist($contact);
            $em->flush();

            $dispacher->dispatch(new MailRegisteredEvent($contact), MailRegisteredEvent::NAME);

            $this->addFlash('success', 'Votre demande à bien été prise en compte !');
            return $this->redirectToRoute('home');
        }

        return $this->render('index/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'contactForm' => $form,
            'experiences' => $experienceRepository->findAll(),
        ]);
    }


    #[Route('/projects/{id}', name: 'app_project')]
    public function project(Project $project): Response
    {
        return $this->render('projects/projectSingle.html.twig', [
            'project' => $project
        ]);
    }

    #[Route('/experience/{id}', name: 'app_experience')]
    public function experience(Experience $experience): Response
    {
        return $this->render('experience/experienceSingle.html.twig', [
            'experience' => $experience
        ]);
    }
}
