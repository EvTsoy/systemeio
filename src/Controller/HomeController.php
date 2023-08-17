<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\PaymentProcessorRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_base')]
    public function index(
        ProductRepository $productRepository,
        PaymentProcessorRepository $paymentProcessorRepository
    ): Response
    {
        $order = new Order();
        $products = $productRepository->findAll();
        $paymentProcessors = $paymentProcessorRepository->findAll();

        $form = $this->createForm(OrderType::class, $order, [
            'products' => $products,
            'paymentProcessors' => $paymentProcessors,
        ]);

        return $this->render('home/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/success', name: 'app_success')]
    public function success(): Response
    {
        return $this->render('home/success.html.twig');
    }
}
