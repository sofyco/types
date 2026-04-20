<?php declare(strict_types=1);

namespace Sofyco\Types\Model\Finance;

final class Money
{
    public const int FIXED_POINT_FACTOR = 10 ** self::DECIMAL_SCALE;
    private const int DECIMAL_SCALE = 6;

    public static function fromFixedPointStorage(int $amount, int $scale = self::DECIMAL_SCALE): float
    {
        return round($amount / self::FIXED_POINT_FACTOR, $scale);
    }

    public static function toFixedPointStorage(float $amount): int
    {
        return (int) round($amount * self::FIXED_POINT_FACTOR);
    }

    public static function getFee(int|float $amount, float $percent): float
    {
        return self::fromFixedPointStorage(
            amount: (int) (self::toFixedPointStorage($amount) * self::toFixedPointStorage($percent) / self::toFixedPointStorage(100)),
        );
    }
}
