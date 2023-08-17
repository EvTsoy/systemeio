<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\CouponValidator;
use App\Service\PriceCalculator;
use App\Service\TaxNumberValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationController extends AbstractController
{
    public function __construct(
        private TaxNumberValidator $taxNumberValidator,
        private CouponValidator $couponValidator,
        private PriceCalculator $priceCalculator,
        private ProductRepository $productRepository
    )
    {}

    #[Route('/api/tax-number-validation', name: 'tax_number_validation', methods: ['GET'])]
    public function taxNumberValidation(
        Request $request,
    ): JsonResponse
    {
        $taxNumber = $request->query->get('taxNumber');
        $couponCode = $request->query->get('couponCode');
        $productId = $request->query->get('product');

        $coupon = $this->couponValidator->validate($couponCode);
        $tax = $this->taxNumberValidator->validate($taxNumber);
        $product = $this->productRepository->find($productId);

        if (!$tax) {
            return new JsonResponse('Tax Number is Not Valid', Response::HTTP_BAD_REQUEST);
        }

        if (!$coupon) {
            $price = $this->priceCalculator->calculate($product, $tax, null);
        } else {
            $price = $this->priceCalculator->calculate($product, $tax, $coupon);
        }

        return $this->json([
            'success' => true,
            'price' => $price
        ]);
    }
}
