<?php

namespace App\Service;


use App\Entity\Coupon;
use App\Entity\Product;
use App\Entity\Tax;

class PriceCalculator
{
    public function calculate(Product $product, Tax $tax, ?Coupon $coupon): float
    {
        $price = $product->getPrice() + $product->getPrice() * ($tax->getValue() / 100);
        if($coupon) {
            if ($coupon->getType()?->getType() === 'Фиксированная сумма скидки') {
                $price -= $coupon->getValue();
            }

            if ($coupon->getType()?->getType() === 'Процент от суммы покупки') {
                $price -= $price * ($coupon->getValue() / 100);
            }
        }

        return number_format((float) $price, 2, '.', '');
    }
}