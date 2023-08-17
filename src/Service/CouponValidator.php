<?php

namespace App\Service;


use App\Entity\Coupon;
use App\Repository\CouponRepository;

class CouponValidator
{
    public function __construct(private CouponRepository $couponRepository) {}

    public function validate(string $couponCode): Coupon | bool {
        $coupon = $this->couponRepository->findOneBy([
            'code' => $couponCode
        ]);

        if (!$coupon) {
            return false;
        }
        return $coupon;
    }
}