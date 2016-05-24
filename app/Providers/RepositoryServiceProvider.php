<?php

namespace ConstruLink\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ConstruLink\Repositories\CategoryRepository'
            , 'ConstruLink\Repositories\CategoryRepositoryEloquent'
        );

        $this->app->bind(
            'ConstruLink\Repositories\ProductRepository'
            , 'ConstruLink\Repositories\ProductRepositoryEloquent'
        );

        $this->app->bind(
            'ConstruLink\Repositories\ClientRepository'
            , 'ConstruLink\Repositories\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'ConstruLink\Repositories\UserRepository'
            , 'ConstruLink\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind(
            'ConstruLink\Repositories\OrderRepository'
            , 'ConstruLink\Repositories\OrderRepositoryEloquent'
        );
    }

}