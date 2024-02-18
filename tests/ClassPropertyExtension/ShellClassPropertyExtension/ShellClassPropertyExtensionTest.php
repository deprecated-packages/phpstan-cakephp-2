<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Tests\ClassPropertyExtension\ShellClassPropertyExtension;

use PHPStan\Testing\TypeInferenceTestCase;
use PHPStanCakePHP2\ClassPropertyExtension\ShellClassPropertyExtension;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @see \PHPStanCakePHP2\ClassPropertyExtension\ShellClassPropertyExtension
 */
final class ShellClassPropertyExtensionTest extends TypeInferenceTestCase
{
    #[DataProvider('dataFileAsserts')]
    public function test(string $assertType, string $file, ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function dataFileAsserts(): \Iterator
    {
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_shell_model.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/existing_shell_task.php');
        yield from self::gatherAssertTypes(__DIR__ . '/Fixture/invalid_shell_property.php');
    }

    /**
     * @return string[]
     */
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

        $this->assertContains(ShellClassPropertyExtension::class, $extensionClasses);
    }
}
