<?php

namespace Modules\RestSocialLogin\Providers;

use Illuminate\Support\ServiceProvider;
use Config;

class RestSocialLoginServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('sociallogin.php')
        ]);

        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'sociallogin');
        $this->mergeConfigFrom(__DIR__.'/../Config/jwt.php', 'jwt');
        $this->mergeConfigFrom(__DIR__.'/../Config/services.php', 'services');

        config(['jwt' => require __DIR__.'/../Config/jwt.php']);
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/sociallogin');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/sociallogin';
        }, Config::get('view.paths')), [$sourcePath]), 'sociallogin');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/sociallogin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'sociallogin');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'sociallogin');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
