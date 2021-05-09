<?php

namespace Javck\Totemzh;

use Illuminate\Support\ServiceProvider;

class TotemzhServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/totem'),
            __DIR__ . '/../lang' => base_path('resources/lang/vendor/totem'),
            __DIR__ . '/../config' => base_path('config'),
        ]);
    }

    public function provides()
    {
        return ['Totemzh'];
    }
}
