<?php

declare(strict_types=1);

use Controller;

class BaseController extends Controller
{
    /**
     * @var array<array-key, string>
     */
    public $components = ['Basic'];
}
