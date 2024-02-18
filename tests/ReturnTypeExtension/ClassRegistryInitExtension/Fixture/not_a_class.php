<?php

declare(strict_types=1);

use function PHPStan\Testing\assertType;

$notClass = ClassRegistry::init('NotAClass');
assertType('bool|object', $notClass);
