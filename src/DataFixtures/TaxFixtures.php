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
            'taxNumber' => 'DE',
        ]);

        TaxFactory::createOne([
            'country'   => 'Italy',
            'value'     => 22,
            'taxNumber' => 'IT',
        ]);

        TaxFactory::createOne([
            'country'   => 'France',
            'value'     => 20,
            'taxNumber' => 'FR',
        ]);

        TaxFactory::createOne([
            'country'   => 'Greece',
            'value'     => 24,
            'taxNumber' => 'GR',
        ]);

        $manager->flush();
    }
}
