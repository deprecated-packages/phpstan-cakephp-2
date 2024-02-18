<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\Contract;

interface PropertyNameExtensionInterface
{
    /**
     * Get the class name of the type of property.
     */
    public function getPropertyParentClassName(): string;

    /**
     * Get the class names which can contain the property.
     *
     * @return string[]
     */
    public function getContainingClassNames(): array;

    /**
     * Return the class name from the property name.
     */
    public function getClassNameFromPropertyName(string $propertyName): string;
}
