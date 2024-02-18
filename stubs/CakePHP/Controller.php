<?php

class Controller
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
