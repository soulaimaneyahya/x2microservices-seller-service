<?php

return [
    'products' => [
        'base_uri' => env('PRODUCTS_SERVICE_BASE_URL'),
        'secret' => env('PRODUCTS_SERVICE_SECRET'),
    ],

    'categories' => [
        'base_uri' => env('CATEGORIES_SERVICE_BASE_URL'),
        'secret' => env('CATEGORIES_SERVICE_SECRET'),
    ],
];
