<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\ClassPropertyExtension;

/**
 * Adds {@link Model}s as properties to {@link Shell}s.
 *
 * @see \PHPStanCakePHP2\Tests\ClassPropertyExtension\ShellClassPropertyExtension\ShellClassPropertyExtensionTest
 */
final class ShellClassPropertyExtension extends AbstractClassPropertyExtension
{
    public function getPropertyParentClassName(): string
    {
        return 'Shell';
    }

    /**
     * @return array<string>
     */
    public function getContainingClassNames(): array
    {
        return ['Shell'];
    }

    public function getClassNameFromPropertyName(
        string $propertyName
    ): string {
        return $propertyName . 'Task';
    }
}
