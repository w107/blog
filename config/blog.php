<?php

return [
    'route' => [
        'prefix' => env('BLOG_ROUTE_PREFIX', 'blog'),
    ],
    'database' => [
        //数据库前缀
        'prefix' => 'blog_',
    ],
];