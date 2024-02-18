<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\ClassPropertyExtension\ShellClassPropertyExtension;

use PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider;
use PHPStan\Testing\TypeInferenceTestCase;
<<<<<<< HEAD
use PHPStanCakePHP2\ClassPropertyExtension\ShellClassPropertyExtension;
=======
>>>>>>> 9282ba2 (move shell property extension to correct namespace)
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ClassPropertyExtension\ShellClassPropertyExtension
 */
final class ShellClassPropertyExtensionTest extends TypeInferenceTestCase
{
<<<<<<< HEAD
<<<<<<< HEAD
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
=======
    /**
     * @param mixed ...$args
     */
=======
>>>>>>> 9d38081 (misc)
    #[DataProvider('dataFileAsserts')]
    public function testShellExtensions(string $assertType, string $file, ...$args): void
>>>>>>> 9282ba2 (move shell property extension to correct namespace)
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

<<<<<<< HEAD
=======
    /**
     * @return mixed[]
     */
>>>>>>> 9282ba2 (move shell property extension to correct namespace)
    public static function dataFileAsserts(): iterable
    {
//        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_shell_model.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_shell_task.php');
//        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/invalid_shell_property.php');
    }

    /**
     * @return string[]
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../config/extension.neon'];
    }
<<<<<<< HEAD

    public function testExtensionIsLoaded(): void
    {
        // make sure the extension is loaded
        $loadedExtensions = $this->getContainer()->getServicesByTag('phpstan.broker.propertiesClassReflectionExtension');

        $extensionClasses = [];
        foreach ($loadedExtensions as $loadedExtension) {
            $extensionClasses[] = get_class($loadedExtension);
        }

        $this->assertContains(ShellClassPropertyExtension::class, $extensionClasses);
    }
=======
>>>>>>> 9282ba2 (move shell property extension to correct namespace)
}
