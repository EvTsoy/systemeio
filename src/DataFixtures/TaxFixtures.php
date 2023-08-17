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
        ]);

        TaxFactory::createOne([
            'country'   => 'Italy',
            'value'     => 22,
            'countryCode' => 'IT',
        ]);

        TaxFactory::createOne([
            'country'   => 'France',
            'value'     => 20,
            'countryCode' => 'FR',
        ]);

        TaxFactory::createOne([
            'country'   => 'Greece',
            'value'     => 24,
            'countryCode' => 'GR',
        ]);

        $manager->flush();
    }
}
