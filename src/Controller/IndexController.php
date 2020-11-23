<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

  
  /**
   * @Route("/", name="index")
   */
  public function index(ArticleRepository $repository): Response
  {
    $articles = $repository->findAll();
    return $this->render('index/index.html.twig', [
      'controller_name' => 'IndexController',
      'articles'=> $articles
    ]);
    }

  /**
   * @Route("/promo", name="promo")
   */
  public function promo(ArticleRepository $repository): Response
  {
    $articles = $repository->findPromo();
    return $this->render('index/promo.html.twig', [
      'controller_name' => 'IndexController',
      'articles'=> $articles
    ]);
  }
  /**
   * @Route("/all", name="all")
   */
  public function All(ArticleRepository $repository): Response
  {
    $articles = $repository->findAll();
    return $this->render('index/all.html.twig', [
      'controller_name' => 'IndexController',
      'articles'=> $articles
    ]);
  }
}

