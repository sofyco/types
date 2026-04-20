<?php declare(strict_types=1);

namespace Sofyco\Types\Model\Date;

final readonly class DateRange
{
    public const string TODAY = 'today';
    public const string YESTERDAY = 'yesterday';
    public const string LAST_7_DAYS = 'last7days';
    public const string LAST_30_DAYS = 'last30days';
    public const string LAST_90_DAYS = 'last90days';
    public const string LAST_MONTH = 'lastMonth';
    public const string LAST_YEAR = 'lastYear';
    public const string THIS_MONTH = 'thisMonth';
    public const string THIS_YEAR = 'thisYear';

    public function __construct(public string $value)
    {
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return new \DateTimeImmutable(match ($this->value) {
            self::TODAY => 'today midnight',
            self::YESTERDAY => 'yesterday midnight',
            self::LAST_7_DAYS => '-6 days midnight',
            self::LAST_30_DAYS => '-29 days midnight',
            self::LAST_90_DAYS => '-89 days midnight',
            self::LAST_MONTH => 'first day of last month midnight',
            self::LAST_YEAR => 'first day of January last year midnight',
            self::THIS_MONTH => 'first day of this month midnight',
            self::THIS_YEAR => 'first day of January this year midnight',
            default => $this->getDateFromString(explode('-', $this->value)[0]) . ' midnight',
        });
    }

    public function getEndDate(): \DateTimeImmutable
    {
        return new \DateTimeImmutable(match ($this->value) {
            self::TODAY, self::LAST_30_DAYS, self::LAST_7_DAYS, self::LAST_90_DAYS => 'today 23:59:59.999999',
            self::YESTERDAY => 'yesterday 23:59:59.999999',
            self::LAST_MONTH => 'last day of last month 23:59:59.999999',
            self::LAST_YEAR => 'last day of December last year 23:59:59.999999',
            self::THIS_MONTH => 'last day of this month 23:59:59.999999',
            self::THIS_YEAR => 'last day of December this year 23:59:59.999999',
            default => $this->getDateFromString(value: explode('-', $this->value)[1] ?? '') . ' 23:59:59.999999',
        });
    }

    private function getDateFromString(string $value): string
    {
        return preg_match('#\d{6}#', $value) ? $value : 'today';
    }
}
