<?php

namespace App\DataFixtures;

use App\Factory\PaymentProcessorFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaymentProcessorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PaymentProcessorFactory::createOne([
            'title' => 'Paypal',
        ]);

        PaymentProcessorFactory::createOne([
            'title' => 'Stripe',
        ]);

        $manager->flush();
    }
}
