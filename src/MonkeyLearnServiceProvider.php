<?php

namespace Kurt\MonkeyLearn;

use MonkeyLearn\Client;
use Illuminate\Support\ServiceProvider;

class MonkeyLearnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__.'/helpers.php';

        $this->app->singleton(Client::class, function () {
            $api_key = config('services.monkeylearn.api_key');

            return new Client($api_key);
        });

        $this->app->alias(Client::class, 'monkeylearn');
    }
}
