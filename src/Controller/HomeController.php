<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_base')]
    public function index(
        ProductRepository $productRepository,
    ): Response
    {
        $order = new Order();
        $products = $productRepository->findAll();
        $form = $this->createForm(OrderType::class, $order, [
            'products' => $products
        ]);

        return $this->render('home/index.html.twig', [
            'form' => $form,
        ]);
    }
}
