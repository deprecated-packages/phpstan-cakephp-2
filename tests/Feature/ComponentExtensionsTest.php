<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\Feature;

use PHPStan\Testing\TypeInferenceTestCase;

class ComponentExtensionsTest extends TypeInferenceTestCase
{
    /**
     * @return mixed[]
     */
    public static function dataFileAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__ . '/data/existing_component_component.php');
        yield from self::gatherAssertTypes(__DIR__ . '/data/invalid_component_property.php');
    }

    /**
     * @dataProvider dataFileAsserts
     * @param mixed $args
     */
    public function testControllerExtensions(string $assertType, string $file, ...$args): void
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
