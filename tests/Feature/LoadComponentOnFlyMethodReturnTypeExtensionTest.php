<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\Feature;

use PHPStan\Testing\TypeInferenceTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class LoadComponentOnFlyMethodReturnTypeExtensionTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function dataFileAsserts(): \Iterator
    {
        yield from self::gatherAssertTypes(__DIR__ . '/data/loading_component_loaded_on_fly.php');
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/data/phpstan.neon'];
    }
}
