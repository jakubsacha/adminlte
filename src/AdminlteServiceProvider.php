<?php
/**
 * @author jsacha
 * @since 09/05/15 16:02
 */

namespace jakubsacha\adminlte;


use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use jakubsacha\adminlte\Console\Commands\InstallCommand;

/**
 * Class AdminlteServiceProvider
 */
class AdminlteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminlte');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/adminlte'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['command.adminlte.install'] = $this->app->share(
            function ($app) {
                return new InstallCommand($this->app['Illuminate\Contracts\Auth\Registrar']);
            }
        );

        $this->commands(['command.adminlte.install']);
        $this->setUpRoutes($this->app->router);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.adminlte.install'];
    }

    /**
     * Registers routes for admin bundle
     *
     * @param $router
     */
    private function setUpRoutes(Router $router)
    {
        $router->group(
            ['namespace' => 'jakubsacha\adminlte\Http\Controllers'],
            function ($router)
            {
                require __DIR__ . '/Http/routes.php';
            }
        );
    }
}