<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\ClassPropertyExtension;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPStanCakePHP2\Contract\PropertyNameExtensionInterface;
use PHPStanCakePHP2\Reflection\PublicReadOnlyPropertyReflection;

abstract class AbstractClassPropertyExtension implements PropertiesClassReflectionExtension, PropertyNameExtensionInterface
{
    private ReflectionProvider $reflectionProvider;

    public function __construct(ReflectionProvider $reflectionProvider)
    {
        $this->reflectionProvider = $reflectionProvider;
    }

    public function hasProperty(
        ClassReflection $classReflection,
        string $propertyName
    ): bool {
        $propertyClassName = $this->getClassNameFromPropertyName($propertyName);

        return array_filter(
            $this->getContainingClassNames(),
            [$classReflection, 'is']
        )
            && $this->reflectionProvider->hasClass($propertyClassName)
            && $this->reflectionProvider->getClass($propertyClassName)
                ->is($this->getPropertyParentClassName());
    }

    public function getProperty(
        ClassReflection $classReflection,
        string $propertyName
    ): PropertyReflection {
        $correctedPropertyName = $this->getClassNameFromPropertyName($propertyName);

        return new PublicReadOnlyPropertyReflection($correctedPropertyName, $classReflection);
    }
}
