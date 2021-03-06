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
        $this->app->singleton(
            \App\Repository\Posts\PostRepositoryInterface::class,
            \App\Repository\Posts\PostRepository::class
        );
        $this->app->singleton(
            \App\Repository\Project\ProjectRepositoryInterface::class,
            \App\Repository\Project\ProjectRepository::class
        );
        $this->app->singleton(
            \App\Repository\ProjectType\ProjectTypeRepositoryInterface::class,
            \App\Repository\ProjectType\ProjectTypeRepository::class
        );
        $this->app->singleton(
            \App\Repository\ProjectWard\ProjectWardRepositoryInterface::class,
            \App\Repository\ProjectWard\ProjectWardRepository::class
        );
        $this->app->singleton(
            \App\Repository\ProjectDistrict\ProjectDistrictRepositoryInterface::class,
            \App\Repository\ProjectDistrict\ProjectDistrictRepository::class
        );
        $this->app->singleton(
            \App\Repository\ProjectProvince\ProjectProvinceRepositoryInterface::class,
            \App\Repository\ProjectProvince\ProjectProvinceRepository::class
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
