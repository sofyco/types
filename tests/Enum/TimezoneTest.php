<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Enum;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Enum\Country;
use Sofyco\Types\Enum\Timezone;

final class TimezoneTest extends TestCase
{
    #[Test]
    public function itFindsTimezoneByCountry(): void
    {
        self::assertSame(Timezone::EUROPE_KYIV, Timezone::findByCountry(Country::UKRAINE));
    }

    #[Test]
    public function itReturnsNullWhenCountryHasNoTimezoneMapping(): void
    {
        self::assertNull(Timezone::findByCountry(Country::ALAND_ISLANDS));
    }
}
