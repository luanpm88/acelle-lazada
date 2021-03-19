<?php

namespace Acelle\Plugin\Lazada;

use Illuminate\Support\ServiceProvider as Base;
use Acelle\Plugin\Lazada\Main;

class ServiceProvider extends Base
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Get the Plugin Main object
        $main = new Main();

        $main->registerHooks();

        $this->publishes([
            __DIR__.'/../resources/views' => $this->app->basePath('resources/views/vendor/lazada'),
        ]);

        // lang
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'lazada');

        // routes
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        // view
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lazada');

        // assets
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/lazada'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
