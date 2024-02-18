<?php

declare(strict_types=1);

namespace ClassPropertyExtension\ClassModelsPropertyExtension;

use PHPStan\Testing\TypeInferenceTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ClassPropertyExtension\ClassModelsPropertyExtension
 */
final class ClassModelPropertyExtensionsTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    /**
     * @return mixed[]
     */
    public static function dataFileAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/core_model_behavior.php');
//        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/custom_model_behavior.php');
//        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/invalid_model_property.php');
//        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_model_model.php');
    }

    /**
     * @return string[]
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../config/phpstan.neon'];
    }
}
