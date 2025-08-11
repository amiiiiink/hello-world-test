<?php

namespace Amiiiiink\HelloWorld;

use Illuminate\Support\ServiceProvider;

class HelloWorldServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/helloworld.php', 'helloworld');

        $this->app->singleton('helloworld', function () {
            return new HelloWorld();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/helloworld.php' => config_path('helloworld.php'),
        ], 'hello-world-config');
    }
}
