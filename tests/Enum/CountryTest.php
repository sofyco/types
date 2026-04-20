<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Enum;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Enum\Country;
use Sofyco\Types\Enum\Language;

final class CountryTest extends TestCase
{
    #[Test]
    public function itFindsCountryByKnownName(): void
    {
        self::assertSame(Country::ANDORRA, Country::findCountryByName('Andorra'));
        self::assertSame(Country::BAHAMAS, Country::findCountryByName('The Bahamas'));
    }

    #[Test]
    public function itReturnsNullWhenCountryNameIsUnknown(): void
    {
        self::assertNull(Country::findCountryByName('Unknown Country'));
    }

    #[Test]
    public function itFindsCountryByLanguage(): void
    {
        self::assertSame(Country::UKRAINE, Country::findCountryByLanguage(Language::UKRAINIAN));
    }

    #[Test]
    public function itFindsLanguageByCountry(): void
    {
        self::assertSame(Language::UKRAINIAN, Country::findLanguageByCountry(Country::UKRAINE));
    }

    #[Test]
    public function itReturnsNullWhenCountryHasNoLanguageMapping(): void
    {
        self::assertNull(Country::findLanguageByCountry(Country::CUBA));
    }
}
