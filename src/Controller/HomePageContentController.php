<?php

namespace App\Controller;

use App\Entity\HomePageContent;
use App\Form\HomePageContentType;
use App\Repository\HomePageContentRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/home/page/content")
 */
class HomePageContentController extends AbstractController
{
    /**
     * @Route("/", name="home_page_content_index", methods={"GET"})
     */
    public function index(HomePageContentRepository $homePageContentRepository): Response
    {
        return $this->render('home_page_content/index.html.twig', [
            'home_page_contents' => $homePageContentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="home_page_content_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader ): Response
    {
        $homePageContent = new HomePageContent();
        $form = $this->createForm(HomePageContentType::class, $homePageContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //загрузка изображения ------->
            $fileCarusel = $homePageContent->getImgCarusel();
            $fileNameCarusel = $fileUploader->upload($fileCarusel);
            $homePageContent->setImgCarusel($fileNameCarusel);

            $fileCircle = $homePageContent->getImgCircle();
            $fileNameCircle = $fileUploader->upload($fileCircle);
            $homePageContent->setImgCircle($fileNameCircle);

            $fileMarketing = $homePageContent->getImgMarketing();
            $fileNameMarketing = $fileUploader->upload($fileMarketing);
            $homePageContent->setImgMarketing($fileNameMarketing);
            // <------------------------
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($homePageContent);
            $entityManager->flush();

            return $this->redirectToRoute('home_page_content_index');
        }

        return $this->render('home_page_content/new.html.twig', [
            'home_page_content' => $homePageContent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_page_content_show", methods={"GET"})
     */
    public function show(HomePageContent $homePageContent): Response
    {
        return $this->render('home_page_content/show.html.twig', [
            'home_page_content' => $homePageContent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="home_page_content_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HomePageContent $homePageContent, FileUploader $fileUploader): Response
    {
        $imageCarusel = $homePageContent->getImgCarusel();
        $homePageContent->setImgCarusel(
            new File($this->getParameter('images_directory') . '/' . $homePageContent->getImgCarusel())
        );

        $imageCircle = $homePageContent->getImgCircle();
        $homePageContent->setImgCircle(
            new File($this->getParameter('images_directory') . '/' . $homePageContent->getImgCircle())
        );

        $imageMarketing = $homePageContent->getImgMarketing();
        $homePageContent->setImgMarketing(
            new File($this->getParameter('images_directory') . '/' . $homePageContent->getImgMarketing())
        );

        $form = $this->createForm(HomePageContentType::class, $homePageContent);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //загрузка изображения ------->
            $fileCarusel = $homePageContent->getImgCarusel();
            $fileCircle = $homePageContent->getImgCircle();
            $fileMarketing = $homePageContent->getImgMarketing();

            if ($fileCarusel) {
                $fileNameCarusel = $fileUploader->upload($fileCarusel);
                $homePageContent->setImgCarusel($fileNameCarusel);
            } else {
                $homePageContent->setImgCarusel($imageCarusel);
            }


            if ($fileCircle) {
                $fileNameCircle = $fileUploader->upload($fileCircle);
                $homePageContent->setImgCircle($fileNameCircle);
            } else {
                $homePageContent->setImgCircle($imageCircle);
            }


            if ($fileMarketing) {
                $fileNameMarketing = $fileUploader->upload($fileMarketing);
                $homePageContent->setImgMarketing($fileNameMarketing);
            } else {
                $homePageContent->setImgMarketing($imageMarketing);
            }




            // <------------------------

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home_page_content_index');
        }

        return $this->render('home_page_content/edit.html.twig', [
            'home_page_content' => $homePageContent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_page_content_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HomePageContent $homePageContent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$homePageContent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($homePageContent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home_page_content_index');
    }
}
