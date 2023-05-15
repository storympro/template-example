<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    // Головна
    public function main(): Response
    {
        return $this->render('public/page/main.html.twig', [
            'title' => __('title', [], 'page_main'),
        ]);
    }

    // Про нас
    #[Route('/about', name: 'page_about')]
    public function about(): Response
    {
        return $this->render('public/page/about.html.twig', [
            'title' => __('title', [], 'page_about'),
        ]);
    }

    // Контакти
    #[Route('/contact', name: 'page_contact')]
    public function contact(): Response
    {
        return $this->render('public/page/contact.html.twig', [
            'title' => __('title', [], 'page_contact'),
        ]);
    }

    // ...
}
