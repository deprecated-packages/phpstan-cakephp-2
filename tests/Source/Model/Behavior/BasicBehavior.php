<?php

namespace PHPStanCakePHP2\Tests\Source\Model\Behavior;

use Model;
use ModelBehavior;

class BasicBehavior extends ModelBehavior
{
    public function behaviorMethod(Model $model, string $string): string
    {
        return 'string: ' . $string;
    }
}
