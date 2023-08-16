<?php

namespace App\DataFixtures;

use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ProductFactory::createOne([
            'title' => 'Iphone',
            'price' => 100,
        ]);

        ProductFactory::createOne([
            'title' => 'Наушники',
            'price' => 20,
        ]);

        ProductFactory::createOne([
            'title' => 'Чехол',
            'price' => 10,
        ]);

        $manager->flush();
    }
}
