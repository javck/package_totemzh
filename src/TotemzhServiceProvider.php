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
            __DIR__ . '/../assets' => base_path('public/vendor/totem/img'),
        ]);
    }

    public function provides()
    {
        return ['Totemzh'];
    }
}
