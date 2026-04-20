<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Enum;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Enum\DayOfWeek;

final class DayOfWeekTest extends TestCase
{
    #[Test]
    public function itContainsSevenDays(): void
    {
        self::assertCount(7, DayOfWeek::cases());
    }

    #[Test]
    public function itProvidesExpectedEnumValues(): void
    {
        self::assertSame('Monday', DayOfWeek::MONDAY->value);
        self::assertSame('Sunday', DayOfWeek::SUNDAY->value);
    }
}
