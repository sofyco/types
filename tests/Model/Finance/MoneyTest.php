<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Model\Finance;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Model\Finance\Money;

final class MoneyTest extends TestCase
{
    #[Test]
    public function itConvertsToAndFromFixedPointStorage(): void
    {
        $fixedPointAmount = Money::toFixedPointStorage(12.345678);

        self::assertSame(12345678, $fixedPointAmount);
        self::assertSame(12.345678, Money::fromFixedPointStorage($fixedPointAmount));
    }

    #[Test]
    public function itRoundsWhenConvertingToFixedPointStorage(): void
    {
        self::assertSame(12345679, Money::toFixedPointStorage(12.3456786));
    }

    #[Test]
    public function itCalculatesFee(): void
    {
        self::assertSame(2.5, Money::getFee(100, 2.5));
    }
}
