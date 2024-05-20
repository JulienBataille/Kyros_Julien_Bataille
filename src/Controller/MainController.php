<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\AuthorRepository;
use App\Repository\BackgroundRepository;
use App\Repository\CategoryRepository;
use App\Repository\InfoContactRepository;
use App\Repository\PortfolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, AuthorRepository $author, CategoryRepository $category, PortfolioRepository $portfolio, BackgroundRepository $background, InfoContactRepository $infoContact, ArticleRepository $article): Response
    {
        return $this->render('main/index.html.twig', [
            'auteur' => $author->findOneBy( ['firstName' => 'Julien', 'lastName' => 'Bataillé']),
            'category' =>$category->findAll(),
            'portfolio' =>$portfolio->findAll(),
            'background' =>$background->findAll(),
            'infoContact' =>$infoContact->findAll(),
            'article' =>$article->findAll()

              ]);
    }
}
