<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Page;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DbTestController extends AbstractController
{
    #[Route('/db/test', name: 'app_db_test')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // récupération du repository des categories
        $repository = $doctrine->getRepository(Category::class);
        // récupération de la liste complète de toutes les categories
        $categories = $repository->findAll();
        // inspection de la liste
        dump($categories);
        
        $repository = $doctrine->getRepository(Tag::class);
        $tags = $repository->findAll();
        dump($tags);

        $repository = $doctrine->getRepository(Article::class);
        $articles = $repository->findAll();

        foreach ($articles as $article){
            dump($article);

            $tags = $article->getTags();

            foreach ($tags as $tag){
                dump($tag);
            }
        }
            // récupération du repository des categories
            $repository = $doctrine->getRepository(Page::class);
            // récupération de la liste complète de toutes les categories
            $pages = $repository->findAll();
            dump($pages);

        exit();
    }
}