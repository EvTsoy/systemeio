<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\PaymentProcessorRepository;
use App\Repository\ProductRepository;
use App\Service\CouponValidator;
use App\Service\PaymentService;
use App\Service\PriceCalculator;
use App\Service\TaxNumberValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateOrderController extends AbstractController
{
    public function __construct(
        private TaxNumberValidator $taxNumberValidator,
        private CouponValidator $couponValidator,
        private PriceCalculator $priceCalculator,
        private ProductRepository $productRepository,
        private PaymentProcessorRepository $paymentProcessorRepository,
        private PaymentService $paymentService,
    )
    {}

    #[Route('/api/create-order', name: 'create_order', methods: ['POST'])]
    public function createOrder(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse
    {
        $order = new Order();
        $jsonData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $taxNumber = $jsonData['taxNumber'];
        $couponCode = $jsonData['couponCode'];
        $productId = $jsonData['product'];
        $paymentProcessorId = $jsonData['paymentProcessor'];

        $coupon = $this->couponValidator->validate($couponCode);
        $tax = $this->taxNumberValidator->validate($taxNumber);
        $product = $this->productRepository->find($productId);
        $paymentProcessor = $this->paymentProcessorRepository->find($paymentProcessorId);

        if (!$tax) {
            return new JsonResponse('Tax Number is Not Valid', Response::HTTP_BAD_REQUEST);
        }

        if (!$coupon) {
            $price = $this->priceCalculator->calculate($product, $tax, null);
        } else {
            $price = $this->priceCalculator->calculate($product, $tax, $coupon);
        }

        try {
            $this->paymentService->process($paymentProcessor, $price);
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $order->setProduct($product);
        $order->setTax($tax);

        if ($coupon) {
            $order->setCoupon($coupon);
        }
        $order->setPrice($price);
        $order->setPaymentProcessor($paymentProcessor);

        $entityManager->persist($order);
        $entityManager->flush();

        return $this->json([
            'success' => true,
        ]);
    }
}
