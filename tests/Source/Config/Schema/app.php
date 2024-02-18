<?php

use CakeSchema;

class AppSchema extends CakeSchema
{
    /**
     * @var array<string, mixed>
     */
    public $basic_models = [
        'id' => [
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'length' => 10,
            'key' => 'primary',
        ],
        'indexes' => [
            'PRIMARY' => [
                'column' => 'id',
                'unique' => 1,
            ],
        ],
    ];

    /**
     * @var array<string, mixed>
     */
    public $table_without_models = [
        'id' => [
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'length' => 10,
            'key' => 'primary',
        ],
        'indexes' => [
            'PRIMARY' => [
                'column' => 'id',
                'unique' => 1,
            ],
        ],
    ];
}
