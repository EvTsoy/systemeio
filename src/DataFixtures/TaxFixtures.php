<?php

namespace App\DataFixtures;

use App\Factory\ProductFactory;
use App\Factory\TaxFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaxFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        TaxFactory::createOne([
            'country'   => 'Germany',
            'value'     => 19,
            'countryCode' => 'DE',
            'pattern' => '^[A-Za-z]{2}\d{9}$'
        ]);

        TaxFactory::createOne([
            'country'   => 'Italy',
            'value'     => 22,
            'countryCode' => 'IT',
            'pattern' => '^[A-Za-z]{2}\d{11}$'
        ]);

        TaxFactory::createOne([
            'country'   => 'France',
            'value'     => 20,
            'countryCode' => 'FR',
            'pattern' => '^[A-Za-z]{2}\d{9}$'
        ]);

        TaxFactory::createOne([
            'country'   => 'Greece',
            'value'     => 24,
            'countryCode' => 'GR',
            'pattern' => '^[A-Za-z]{4}\d{9}$'
        ]);

        $manager->flush();
    }
}
