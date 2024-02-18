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
}
