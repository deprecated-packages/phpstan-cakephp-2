<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Test\ReturnTypeExtension\ClassRegistryInitExtension;

use PHPStan\Testing\TypeInferenceTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ClassRegistryInitExtension
 */
final class ClassRegistryInitExtensionTest extends TypeInferenceTestCase
{
    /**
     * @return mixed[]
     */
    public static function dataFileAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/variable_reference.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/table_without_model.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/not_a_class.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/basic_model_string.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/basic_model_class_const_fetch.php');
    }

    /**
     * @param mixed $args
     */
    #[DataProvider('dataFileAsserts')]
    public function testControllerExtensions(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../../config/phpstan.neon',
        ];
    }
}
