<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Test\Feature;

use PHPStan\Testing\TypeInferenceTestCase;

final class ShellExtensionsTest extends TypeInferenceTestCase
{
    /**
     * @return mixed[]
     */
    public static function dataFileAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__ . '/data/existing_shell_model.php');
        yield from self::gatherAssertTypes(__DIR__ . '/data/existing_shell_task.php');
        yield from self::gatherAssertTypes(__DIR__ . '/data/invalid_shell_property.php');
    }

    /**
     * @dataProvider dataFileAsserts
     * @param mixed $args
     */
    public function testShellExtensions(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/data/phpstan.neon',
        ];
    }
}
