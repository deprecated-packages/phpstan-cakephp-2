<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\ClassPropertyExtension;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;

/**
 * Adds {@link Model}s as properties to {@link Shell}s.
 *
 * @see \PHPStanCakePHP2\Tests\ClassPropertyExtension\ShellClassPropertyExtension\ShellClassPropertyExtensionTest
 */
final class ShellClassPropertyExtension implements PropertiesClassReflectionExtension
{
    protected function getPropertyParentClassName(): string
    {
        return 'Shell';
    }

    /**
     * @return array<string>
     */
    protected function getContainingClassNames(): array
    {
        return ['Shell'];
    }

    protected function getClassNameFromPropertyName(
        string $propertyName
    ): string {
        return $propertyName . 'Task';
    }

    public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
    {
        dump(1);
        die;
        // TODO: Implement hasProperty() method.
    }

    public function getProperty(ClassReflection $classReflection, string $propertyName): \PHPStan\Reflection\PropertyReflection
    {
        dump(2);
        die;
        // TODO: Implement getProperty() method.
    }
}
