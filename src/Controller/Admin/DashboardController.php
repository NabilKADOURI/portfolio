<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\Experience;
use App\Entity\Project;
use App\Entity\Technology;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

      
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProjectCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
     
        yield MenuItem::linkToCrud('Projets', 'fas fa-project-diagram', Project::class);
        yield MenuItem::linkToCrud('Experiences', 'fas fa-briefcase', Experience::class);
        yield MenuItem::linkToCrud('Technology', 'fas fa-code', Technology::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-address-book', Contact::class);
    }
}
