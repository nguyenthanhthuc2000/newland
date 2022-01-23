<?php

// namespace App\Providers;
namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        // View::composer(
        //     'profile', 'App\Http\ViewComposers\ProfileComposer'
        // );

        // Using Closure based composers...
        View::composer(['layouts.header', 'layouts.filter'], function ($view) {
            $data = [
                'sell' => DB::table('category')->where('type', 0)->get(),
                'lease' => DB::table('category')->where('type', 1)->get()
            ];
            $view->with($data);
        });
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
}
