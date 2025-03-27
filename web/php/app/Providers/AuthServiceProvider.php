<?php

namespace App\Providers;

use App\Models\Client;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // LumenPassport::routes($this->app->router);

        Passport::loadKeysFrom(storage_path('keys'));

        Passport::tokensExpireIn(\Carbon\Carbon::now()->addDays(7));
        Passport::refreshTokensExpireIn(\Carbon\Carbon::now()->addDays(30));

        Passport::useClientModel(Client::class);

        /**
         * Define the scopes for the API
         */
        Passport::tokensCan([
            'products:read' => 'Read products',

            'categories:read' => 'Read categories',

            'sellers:read' => 'Read sellers',
        ]);

        /**
         * Set the default scopes for the API
         */
        Passport::setDefaultScope([
            'products:read',
            'categories:read',
        ]);
    }
}
