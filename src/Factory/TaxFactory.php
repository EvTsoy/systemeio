<?php

namespace App\Factory;

use App\Entity\Tax;
use App\Repository\TaxRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Tax>
 *
 * @method        Tax|Proxy                     create(array|callable $attributes = [])
 * @method static Tax|Proxy                     createOne(array $attributes = [])
 * @method static Tax|Proxy                     find(object|array|mixed $criteria)
 * @method static Tax|Proxy                     findOrCreate(array $attributes)
 * @method static Tax|Proxy                     first(string $sortedField = 'id')
 * @method static Tax|Proxy                     last(string $sortedField = 'id')
 * @method static Tax|Proxy                     random(array $attributes = [])
 * @method static Tax|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TaxRepository|RepositoryProxy repository()
 * @method static Tax[]|Proxy[]                 all()
 * @method static Tax[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Tax[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Tax[]|Proxy[]                 findBy(array $attributes)
 * @method static Tax[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Tax[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TaxFactory extends ModelFactory
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
            'country' => self::faker()->text(255),
            'taxNumber' => self::faker()->text(255),
            'value' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Tax $tax): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Tax::class;
    }
}
