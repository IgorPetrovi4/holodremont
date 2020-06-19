<?php

namespace App\Controller;

use App\Repository\HomePageContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(HomePageContentRepository $homePageContentRepository): Response
    {
        return $this->render('home_page/index.html.twig', [
            'home_page_contents' => $homePageContentRepository->findAll(),
        ]);
    }
}
