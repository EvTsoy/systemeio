<?php

namespace App\Factory;

use App\Entity\Coupon;
use App\Repository\CouponRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Coupon>
 *
 * @method        Coupon|Proxy                     create(array|callable $attributes = [])
 * @method static Coupon|Proxy                     createOne(array $attributes = [])
 * @method static Coupon|Proxy                     find(object|array|mixed $criteria)
 * @method static Coupon|Proxy                     findOrCreate(array $attributes)
 * @method static Coupon|Proxy                     first(string $sortedField = 'id')
 * @method static Coupon|Proxy                     last(string $sortedField = 'id')
 * @method static Coupon|Proxy                     random(array $attributes = [])
 * @method static Coupon|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CouponRepository|RepositoryProxy repository()
 * @method static Coupon[]|Proxy[]                 all()
 * @method static Coupon[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Coupon[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Coupon[]|Proxy[]                 findBy(array $attributes)
 * @method static Coupon[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Coupon[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CouponFactory extends ModelFactory
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
            'code' => self::faker()->word() . self::faker()->numberBetween(100, 200),
            'type' => CouponTypeFactory::random(),
            'value' => self::faker()->numberBetween(10, 100),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Coupon $coupon): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Coupon::class;
    }
}
