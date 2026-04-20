<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Enum;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Enum\Language;

final class LanguageTest extends TestCase
{
    #[Test]
    public function itResolvesLanguageFromLocale(): void
    {
        self::assertSame(Language::ENGLISH, Language::tryFromLocale('en_US'));
        self::assertSame(Language::ENGLISH, Language::tryFromLocale('EN'));
    }

    #[Test]
    public function itReturnsNullForEmptyOrUnknownLocale(): void
    {
        self::assertNull(Language::tryFromLocale(null));
        self::assertNull(Language::tryFromLocale('zz_ZZ'));
    }
}
