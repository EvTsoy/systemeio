<?php

namespace App\DataFixtures;

use App\Factory\CouponTypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CouponTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CouponTypeFactory::createOne([
            'type' => 'Фиксированная сумма скидки',
        ]);

        CouponTypeFactory::createOne([
            'type' => 'Процент от суммы покупки',
        ]);

        $manager->flush();
    }
}
