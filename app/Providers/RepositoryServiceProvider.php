<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repository\Article\ArticleRepositoryInterface::class,
            \App\Repository\Article\ArticleRepository::class
        );
        $this->app->singleton(
            \App\Repository\Category\CategoryRepositoryInterface::class,
            \App\Repository\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repository\User\UserRepositoryInterface::class,
            \App\Repository\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repository\Direction\DirectionRepositoryInterface::class,
            \App\Repository\Direction\DirectionRepository::class
        );
        $this->app->singleton(
            \App\Repository\Province\ProvinceRepositoryInterface::class,
            \App\Repository\Province\ProvinceRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
