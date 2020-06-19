<?php

namespace App\Controller;

use App\Entity\Feedback;
use App\Form\FeedbackType;
use App\Repository\ContactsRepository;
use App\Repository\HomePageContentRepository;
use App\Repository\OrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(Request $request, HomePageContentRepository $homePageContentRepository): Response
    {

        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($feedback);
            $entityManager->flush();
            $this->addFlash('success', 'Спасибо за Ваш заказ! В ближайшее время мы с Вами свяжемся.');
            return $this->redirectToRoute('home_page');
        }


        return $this->render('home_page/index.html.twig', [
            'home_page_contents' => $homePageContentRepository->findAll(),
            'feedback' => $feedback,
            'form' => $form->createView(),

        ]);
    }


    /**
     * @Route("/price", name="price")
     */
    public function price(OrdersRepository $ordersRepository): Response
    {
        return $this->render('home_page/price.html.twig', [
            'orders' => $ordersRepository->findAll(),
        ]);
    }


}
