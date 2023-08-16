<?php

namespace App\DataFixtures;

use App\Factory\CouponFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CouponFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        CouponFactory::createMany(100);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CouponTypeFixtures::class,
        ];
    }
}
