<?php

namespace App\Controller\Menu;



use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    public function index (CategoryRepository $category, Request $request) : Response
    {
        return $this->render('_partials/header.html.twig',[
                'category' => $category->findAll()
        ]);
    }
}