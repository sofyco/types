<?php declare(strict_types=1);

namespace Sofyco\Types\Model\Security;

use Random\Randomizer;

final readonly class Password
{
    private const int DEFAULT_LENGTH = 16;
    private const string DEFAULT_CHARACTERS = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+{}[]|:;<>?,./';

    public static function generate(int $length = self::DEFAULT_LENGTH, string $characters = self::DEFAULT_CHARACTERS): string
    {
        return new Randomizer()->getBytesFromString(string: $characters, length: $length);
    }
}
