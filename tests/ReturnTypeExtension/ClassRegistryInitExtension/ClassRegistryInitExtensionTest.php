<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\ReturnTypeExtension\ClassRegistryInitExtension;

use Iterator;
use PHPStan\Testing\TypeInferenceTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ReturnTypeExtension\ClassRegistryInitExtension
 */
final class ClassRegistryInitExtensionTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function dataFileAsserts(): Iterator
    {
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/variable_reference.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/not_a_class.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/basic_model_string.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/basic_model_class_const_fetch.php');

        // this one depends on config path "parameters > schemaPaths"
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/table_without_model.php');
    }

    /**
     * @return string[]
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../../config/phpstan.neon',
        ];
    }
}
