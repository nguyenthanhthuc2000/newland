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
            \App\Repository\ImagesArticle\ImagesArticleRepositoryInterface::class,
            \App\Repository\ImagesArticle\ImagesArticleRepository::class
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
        $this->app->singleton(
            \App\Repository\District\DistrictRepositoryInterface::class,
            \App\Repository\District\DistrictRepository::class
        );
        $this->app->singleton(
            \App\Repository\Ward\WardRepositoryInterface::class,
            \App\Repository\Ward\WardRepository::class
        );
        $this->app->singleton(
            \App\Repository\Street\StreetRepositoryInterface::class,
            \App\Repository\Street\StreetRepository::class
        );
        $this->app->singleton(
            \App\Repository\RequestContact\RequestContactRepositoryInterface::class,
            \App\Repository\RequestContact\RequestContactRepository::class
        );
        $this->app->singleton(
            \App\Repository\Setting\SettingRepositoryInterface::class,
            \App\Repository\Setting\SettingRepository::class
        );
        $this->app->singleton(
            \App\Repository\Followers\FollowersRepositoryInterface::class,
            \App\Repository\Followers\FollowersRepository::class
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
