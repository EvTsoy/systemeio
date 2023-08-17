<?php

namespace App\Factory;

use App\Entity\PaymentProcessor;
use App\Repository\PaymentProcessorRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<PaymentProcessor>
 *
 * @method        PaymentProcessor|Proxy                     create(array|callable $attributes = [])
 * @method static PaymentProcessor|Proxy                     createOne(array $attributes = [])
 * @method static PaymentProcessor|Proxy                     find(object|array|mixed $criteria)
 * @method static PaymentProcessor|Proxy                     findOrCreate(array $attributes)
 * @method static PaymentProcessor|Proxy                     first(string $sortedField = 'id')
 * @method static PaymentProcessor|Proxy                     last(string $sortedField = 'id')
 * @method static PaymentProcessor|Proxy                     random(array $attributes = [])
 * @method static PaymentProcessor|Proxy                     randomOrCreate(array $attributes = [])
 * @method static PaymentProcessorRepository|RepositoryProxy repository()
 * @method static PaymentProcessor[]|Proxy[]                 all()
 * @method static PaymentProcessor[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static PaymentProcessor[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static PaymentProcessor[]|Proxy[]                 findBy(array $attributes)
 * @method static PaymentProcessor[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static PaymentProcessor[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class PaymentProcessorFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(PaymentProcessor $paymentProcessor): void {})
        ;
    }

    protected static function getClass(): string
    {
        return PaymentProcessor::class;
    }
}
