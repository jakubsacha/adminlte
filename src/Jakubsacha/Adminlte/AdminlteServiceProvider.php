<?php

namespace Jakubsacha\Adminlte;

use Illuminate\Support\ServiceProvider;

class AdminlteServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->package('jakubsacha/adminlte');
	// override configs
        app('config')->set('syntara::views', app('config')->get('adminlte::views'));
        // register helpers
        $this->registerHelpers();
    }

    public function registerHelpers() {
        // register breadcrumbs
        $this->app['breadcrumbs'] = $this->app->share(function() {
            return new \Jakubsacha\Adminlte\Helpers\Breadcrumbs();
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //

        $this->app['Gravatar'] = $this->app->share(function() {
            
            return new Whmcs();

        });

        $this->app->booting(function() {
          
          $loader = \Illuminate\Foundation\AliasLoader::getInstance();

          $loader->alias('Gravatar', 'Thomaswelton\LaravelGravatar\Facades\Gravatar');

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}
