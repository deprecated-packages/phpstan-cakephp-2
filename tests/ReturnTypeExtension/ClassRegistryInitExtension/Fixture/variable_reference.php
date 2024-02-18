<?php

declare(strict_types=1);

use function PHPStan\Testing\assertType;

$var = 'BasicModel';

assertType('BasicModel', ClassRegistry::init($var));
assertType('bool|object', ClassRegistry::init([123]));
