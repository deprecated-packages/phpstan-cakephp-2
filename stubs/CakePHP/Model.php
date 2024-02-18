<?php

/**
 * Tiny copy of
 * https://github.com/cakephp/cakephp/blob/2.10.24/lib/Cake/Model/Model.php
 */
class Model
{
    public function __get(string $name)
    {
    }

    public function bindTranslation(): bool
    {
        return true;
    }
}
