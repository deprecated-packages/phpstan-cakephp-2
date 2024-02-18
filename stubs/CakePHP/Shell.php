<?php

/**
 * Slim copy of
 * https://github.com/cakephp/cakephp/blob/2.10.24/lib/Cake/Console/Shell.php
 */
class Shell
{
    public function __get(string $name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        }

        return 'some value';
    }
}
