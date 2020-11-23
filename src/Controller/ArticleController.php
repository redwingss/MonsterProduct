<?php

namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
  /**
   * @Route("/article/{id}", name="article")
   */
  public function index(Article $article): Response
  {
    return $this->render('article/index.html.twig', [
      'controller_name' => 'ArticleController',
      'article' => $article
    ]);
  }
  
}
