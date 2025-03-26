<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/**
 * Lumen passport
 * OAuth
 */
$router->post('/oauth-client/{sellerId}', [
    'as' => 'oauth-client',
    'uses' => 'OAuth\OAuthClientController'
]);

$router->post('/oauth/token', [
    'as' => 'oauth.token',
    'uses' => '\Dusterio\LumenPassport\Http\Controllers\AccessTokenController@issueToken'
]);

/**
 * Routes protected by seller credentials
 * Laravel passport
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/me', [
        'as' => 'sellers.auth',
        'uses' => 'OAuth\GetAuthSellerController'
    ]);

    $router->post('/logout', [
        'as' => 'auth.logout',
        'uses' => 'OAuth\LogoutController'
    ]);
});

/**
 * Lumen passport
 * client.credentials
 */
$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * sellers
     */
    $router->get('/sellers', [
        'as' => 'sellers.index',
        'uses' => 'sellers\GetSellersListController'
    ]);

    /**
     * Products
     */
    $router->get('/products', [
        'as' => 'products.index',
        'uses' => 'Products\GetProductsListController'
    ]);

    /**
     * Categories
     */
    $router->get('/categories', [
        'as' => 'categories.index',
        'uses' => 'Categories\GetCategoriesListController'
    ]);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
