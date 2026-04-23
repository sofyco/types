<?php declare(strict_types=1);

namespace Sofyco\Types\Tests\Model\Security;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Sofyco\Types\Model\Security\Password;

final class PasswordTest extends TestCase
{
    #[Test]
    public function generation(): void
    {
        self::assertSame(expected: 12, actual: mb_strlen(Password::generate(length: 12)));
    }
}
