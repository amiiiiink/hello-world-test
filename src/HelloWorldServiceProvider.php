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

        // load views from package
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'helloworld');

        if (file_exists(__DIR__.'/helpers.php')) {
            require_once __DIR__.'/helpers.php';
        }

        $this->publishes([
            __DIR__ . '/../config/helloworld.php' => config_path('helloworld.php'),
        ], 'hello-world-config');


        // publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/helloworld'),
        ], 'views');

        // publish Tailwind-ready CSS to resources/vendor
        $this->publishes([
            __DIR__ . '/../resources/css/helloworld.tailwind.css' => resource_path('vendor/helloworld/helloworld.css'),
        ], 'tailwind');

        // optional: all-in-one
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/helloworld'),
            __DIR__ . '/../resources/css/helloworld.tailwind.css' => resource_path('vendor/helloworld/helloworld.css'),
        ], 'helloworld');




    }
}
