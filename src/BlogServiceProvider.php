<?php

namespace Inn20\Blog;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Inn20\Blog\Services\AppService;

class BlogServiceProvider extends ServiceProvider
{

    protected $commands = [
        Console\InstallCommand::class,
        Console\UninstallCommand::class,
        Console\PublishCommand::class,
    ];

    protected $middlewareGroups = [
        'blog' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Inn20\Blog\Middleware\ViewShare::class,
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadConfigs();
        $this->registerRouteMiddleware();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadBlogRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blog');

        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->commands($this->commands);
        }
    }

    protected function registerRouteMiddleware()
    {
        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([__DIR__.'/../resources/dist' => public_path('vendor/inn-blog')], 'inn-blog-assets');
        $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'inn-blog-lang');
        $this->publishes([__DIR__.'/../config' => config_path()], 'inn-blog-config');
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blog.php', 'blog');
        $this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');
        // Setup auth configuration.
        config(Arr::dot(config('admin.auth', []), 'auth.'));
        config(['admin.route.prefix' => config('blog.route.prefix').'/'.config('admin.route.prefix')]);
    }

    protected function loadBlogRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');
    }

}
