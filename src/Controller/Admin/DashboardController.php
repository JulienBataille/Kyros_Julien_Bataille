<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Users;
use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Portfolio;
use App\Entity\Background;
use App\Entity\InfoContact;
use App\Entity\Work;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;



class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kyros Julien Bataille');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Auteur', 'fas fa-user', Author::class);
        yield MenuItem::linkToCrud('Mes contacts', 'fas fa-user', InfoContact::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-user', Category::class);
        yield MenuItem::linkToCrud('Portfolio', 'fas fa-user', Portfolio::class);
        yield MenuItem::linkToCrud('Images Background', 'fas fa-user', Background::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', Users::class);

     


    }
}
