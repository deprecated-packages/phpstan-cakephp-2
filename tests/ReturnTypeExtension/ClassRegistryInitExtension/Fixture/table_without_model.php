<?php

declare(strict_types=1);

use function PHPStan\Testing\assertType;

$modelWithoutClass = ClassRegistry::init('TableWithoutModel');
assertType('Model', $modelWithoutClass);
