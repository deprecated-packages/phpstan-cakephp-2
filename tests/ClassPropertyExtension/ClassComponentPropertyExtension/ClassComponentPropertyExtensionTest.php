<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\ClassPropertyExtension\ClassComponentPropertyExtension;

use Iterator;
use PHPStan\Testing\TypeInferenceTestCase;
use PHPStanCakePHP2\ClassPropertyExtension\ClassComponentPropertyExtension;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ClassPropertyExtension\ClassComponentPropertyExtension
 */
final class ClassComponentPropertyExtensionTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function dataFileAsserts(): Iterator
    {
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_component_component.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/invalid_component_property.php');
<<<<<<< HEAD
<<<<<<< HEAD
=======
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component_from_parent_controller.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component_with_same_method_name_as_model.php');
>>>>>>> 054699d (fixup! misc)
=======

        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component_from_parent_controller.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_controller_component_with_same_method_name_as_model.php');
>>>>>>> ffdb6aa (fixup! misc)
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../config/phpstan.neon'];
    }

    public function testExtensionIsLoaded(): void
    {
        // make sure the extension is loaded
        $loadedExtensions = $this->getContainer()->getServicesByTag('phpstan.broker.propertiesClassReflectionExtension');

        $extensionClasses = [];
        foreach ($loadedExtensions as $loadedExtension) {
            $extensionClasses[] = get_class($loadedExtension);
        }

        $this->assertContains(ClassComponentPropertyExtension::class, $extensionClasses);
    }
}
