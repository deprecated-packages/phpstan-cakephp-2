<?php

/**
 * Slim copy of
 * https://github.com/cakephp/cakephp/blob/2.10.24/lib/Cake/Controller/Component.php
 */
class Component
{
    public $components = [];

    public function __get(string $name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        }

        return 'some value';
    }
}
