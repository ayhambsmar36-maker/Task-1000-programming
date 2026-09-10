<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Textarea Component Config
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'rows'        => 4,
        'resize'      => 'vertical',
        'size'        => 'md',
        'rounded'     => 'md',
        'shadow'      => 'none',
        'border'      => 'default',
    ],

    'sizes' => [
        'sm' => 'form-control-sm',
        'md' => '',
        'lg' => 'form-control-lg',
    ],

    'resize' => [
        'none'       => 'resize-none',      // كلاس CSS لتعطيل تغيير الحجم
        'vertical'   => 'resize-vertical',
        'horizontal' => 'resize-horizontal',
        'both'       => 'resize-both',
    ],

    'states' => [
        'default' => '',
        'error'   => 'is-invalid',
        'success' => 'is-valid',
    ],

    'rounded' => [
        'none' => 'rounded-0',
        'sm'   => 'rounded-sm',
        'md'   => 'rounded',
        'lg'   => 'rounded-lg',
    ],
];