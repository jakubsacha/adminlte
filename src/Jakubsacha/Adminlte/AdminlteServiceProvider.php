<?php namespace Jakubsacha\Adminlte;

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

        // Override Syntara Config.
        app('config')->set('syntara::views', app('config')->get('adminlte::views'));

        // Register Helpers.
        $this->registerHelpers();
    }

    public function registerHelpers() {
        // Register Breadcrumbs Helper.
        $this->app['breadcrumbs'] = $this->app->share(function() {
            return new Helpers\Breadcrumbs();
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        /*
         * Register the service provider for the dependency.
         */
        $this->app->register('Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider');

        /*
         * Create alias for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Gravatar', '\Thomaswelton\LaravelGravatar\Facades\Gravatar');
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
