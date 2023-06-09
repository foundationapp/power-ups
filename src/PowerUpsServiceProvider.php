<?php

namespace Foundationapp\PowerUps;

use Foundationapp\PowerUps\Helpers\PowerUpHelper;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PowerUpsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'power-ups');
        // dd(__DIR__);
        $this->loadViewsFrom(app_path('PowerUps/Components'), 'powerups');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('power-ups.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/power-ups'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/power-ups'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/power-ups'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                \Foundationapp\PowerUps\Console\Commands\PowerUpList::class,
                \Foundationapp\PowerUps\Console\Commands\PowerUpEnable::class,
                \Foundationapp\PowerUps\Console\Commands\PowerUpDisable::class,
                \Foundationapp\PowerUps\Console\Commands\PowerUpInstall::class,
            ]);

        }

        PowerUpHelper::createPowerUpFileAndFolders();
        // Load the activated power-ups
        $this->loadPowerUps();

        
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'power-ups');

        // Register the main class to use with the facade
        $this->app->singleton('power-ups', function () {
            return new PowerUps;
        });
    }

    public function loadPowerUps(){
        $powerUpDirectory = app_path('PowerUps');
        $powerUps = json_decode(file_get_contents($powerUpDirectory . '/components.json'), true);

        // Dynamically Create each of the Power-ups as a Livewire component
        foreach($powerUps['active'] as $powerUp){
            $className = ucfirst(Str::camel($powerUp));
            $modelName = 'App\\PowerUps\\Components\\' . $className . '\\' . $className;
            Livewire::component('powerup.' . $powerUp, $modelName);
        }
        
    }
}
