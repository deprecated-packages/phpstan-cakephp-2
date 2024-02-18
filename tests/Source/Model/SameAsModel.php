<?php

namespace PHPStanCakePHP2\Tests\Source\Model;
use Model;

class SameAsModel extends Model
{
    public function sameMethod(): string
    {
        return 'test';
    }
}
