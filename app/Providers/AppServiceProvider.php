<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (! $this->app->runningInConsole()) {
//            view()->composer('*', function ($view)
//            {
////                $listClass = GradeClass::where('school_id', getSchoolID(Auth::id()) == 0 ? 0 : getSchoolID(Auth::id()))->get();
//                $listClass = getAllClassIsChool();
////                dd( getAllClassIsChool());
//                $class_info = getClass();
//                $listClassesSys = getAllClassSys();
//
//                $view->with('list_class', $listClass )->with('class_info', $class_info )->with('listClassesSys', $listClassesSys);
//            });
        }
    }
}
