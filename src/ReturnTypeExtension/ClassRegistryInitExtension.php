<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\ReturnTypeExtension;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Type\BooleanType;
use PHPStan\Type\Constant\ConstantStringType;
use PHPStan\Type\DynamicStaticMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ObjectWithoutClassType;
use PHPStan\Type\Type;
use PHPStan\Type\UnionType;
use PHPStanCakePHP2\CakePHP\PortedInflector;
use PHPStanCakePHP2\Service\SchemaService;

/**
 * @see \PHPStanCakePHP2\Tests\ReturnTypeExtension\ClassRegistryInitExtension\ClassRegistryInitExtensionTest
 */
final class ClassRegistryInitExtension implements DynamicStaticMethodReturnTypeExtension
{
    private ReflectionProvider $reflectionProvider;

    private SchemaService $schemaService;

    public function __construct(
        ReflectionProvider $reflectionProvider,
        SchemaService $schemaService
    ) {
        $this->reflectionProvider = $reflectionProvider;
        $this->schemaService = $schemaService;
    }

    public function getClass(): string
    {
        return 'ClassRegistry';
    }

    public function isStaticMethodSupported(MethodReflection $methodReflection): bool
    {
        return $methodReflection->getName() === 'init';
    }

    public function getTypeFromStaticMethodCall(MethodReflection $methodReflection, StaticCall $methodCall, Scope $scope): ?Type
    {
        $argumentType = $scope->getType($methodCall->getArgs()[0]->value);

        if (! $argumentType instanceof ConstantStringType) {
            return $this->getDefaultType();
        }

        $value = $argumentType->getValue();

        if ($this->reflectionProvider->hasClass($value)) {
            return new ObjectType($value);
        }

        $tableName = PortedInflector::tableize($value);
        if ($this->schemaService->hasTable($tableName)) {
            return new ObjectType('Model');
        }

        return $this->getDefaultType();
    }

    private function getDefaultType(): Type
    {
        return new UnionType([
            new BooleanType(),
            new ObjectWithoutClassType(),
        ]);
    }
}
