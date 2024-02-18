<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\ClassPropertyExtension;

/**
 * Adds {@link Model}s as properties to {@link Shell}s
 */
final class ClassModelsPropertyExtension extends AbstractClassPropertyExtension
{
    public function getPropertyParentClassName(): string
    {
        return 'Model';
    }

    /**
     * @return array<string>
     */
    public function getContainingClassNames(): array
    {
        return [
            'Controller',
            'Model',
            'Shell',
        ];
    }

    public function getClassNameFromPropertyName(
        string $propertyName
    ): string {
        return $propertyName;
    }
}
