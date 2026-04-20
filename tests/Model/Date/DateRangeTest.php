<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Model\Date;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Model\Date\DateRange;

final class DateRangeTest extends TestCase
{
    #[Test]
    public function itCalculatesTodayRange(): void
    {
        $dateRange = new DateRange(DateRange::TODAY);

        self::assertSame(new \DateTimeImmutable('today midnight')->format('Y-m-d H:i:s.u'), $dateRange->getStartDate()->format('Y-m-d H:i:s.u'));
        self::assertSame(new \DateTimeImmutable('today 23:59:59.999999')->format('Y-m-d H:i:s.u'), $dateRange->getEndDate()->format('Y-m-d H:i:s.u'));
    }

    #[Test]
    public function itCalculatesCustomMonthRange(): void
    {
        $dateRange = new DateRange('202401-202402');

        self::assertSame(new \DateTimeImmutable('2024-01 midnight')->format('Y-m-d H:i:s.u'), $dateRange->getStartDate()->format('Y-m-d H:i:s.u'));
        self::assertSame(new \DateTimeImmutable('2024-02 23:59:59.999999')->format('Y-m-d H:i:s.u'), $dateRange->getEndDate()->format('Y-m-d H:i:s.u'));
    }

    #[Test]
    public function itFallsBackToTodayForInvalidCustomDates(): void
    {
        $dateRange = new DateRange('invalid-range');

        self::assertSame(new \DateTimeImmutable('today midnight')->format('Y-m-d H:i:s.u'), $dateRange->getStartDate()->format('Y-m-d H:i:s.u'));
        self::assertSame(new \DateTimeImmutable('today 23:59:59.999999')->format('Y-m-d H:i:s.u'), $dateRange->getEndDate()->format('Y-m-d H:i:s.u'));
    }
}
