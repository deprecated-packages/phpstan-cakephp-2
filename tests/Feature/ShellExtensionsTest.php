<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Test\Feature;

use PHPStan\Testing\TypeInferenceTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class ShellExtensionsTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function testShellExtensions(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    /**
     * @return mixed[]
     */
    public static function dataFileAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__ . '/data/existing_shell_model.php');
        yield from self::gatherAssertTypes(__DIR__ . '/data/existing_shell_task.php');
        yield from self::gatherAssertTypes(__DIR__ . '/data/invalid_shell_property.php');
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/data/phpstan.neon'];
    }
}
