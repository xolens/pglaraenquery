<?php

namespace Xolens\PgLaraenquiry;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Xolens\PgLarautil\PgLarautilServiceProvider;

class PgLaraenquiryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(PgLarautilServiceProvider::class);
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../../database/factories');

        $this->publishes([
            __DIR__.'/../../config/xolens-pglaraenquiry.php' => config_path('xolens-pglaraenquiry.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/xolens-pglaraenquiry.php', 'xolens-pglaraenquiry'
        );
    }
}