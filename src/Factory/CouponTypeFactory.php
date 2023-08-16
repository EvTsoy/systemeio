<?php

namespace App\Factory;

use App\Entity\CouponType;
use App\Repository\CouponTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<CouponType>
 *
 * @method        CouponType|Proxy                     create(array|callable $attributes = [])
 * @method static CouponType|Proxy                     createOne(array $attributes = [])
 * @method static CouponType|Proxy                     find(object|array|mixed $criteria)
 * @method static CouponType|Proxy                     findOrCreate(array $attributes)
 * @method static CouponType|Proxy                     first(string $sortedField = 'id')
 * @method static CouponType|Proxy                     last(string $sortedField = 'id')
 * @method static CouponType|Proxy                     random(array $attributes = [])
 * @method static CouponType|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CouponTypeRepository|RepositoryProxy repository()
 * @method static CouponType[]|Proxy[]                 all()
 * @method static CouponType[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static CouponType[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static CouponType[]|Proxy[]                 findBy(array $attributes)
 * @method static CouponType[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static CouponType[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CouponTypeFactory extends ModelFactory
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
            'type' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(CouponType $couponType): void {})
        ;
    }

    protected static function getClass(): string
    {
        return CouponType::class;
    }
}
