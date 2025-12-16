<?php

return [
    'markdown-path' => env('SPECIFY_SPECS_PATH') ? base_path(env('SPECIFY_SPECS_PATH')) : base_path('specs'),
    'subdomain' => false,
    'route_prefix' => 'specify',
    'middleware' => ['web'],
    'enabled' => true,
];
