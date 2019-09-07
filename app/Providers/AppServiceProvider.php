<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Adminnotify;
use App\Count;
use App\Master;
use App\Coursemaster;
use App\Course;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $adminNotifications = Adminnotify::latest()->get();
        $categories = Category::latest()->get();
        $count = Count::all();
        
        View::share('categories', $categories);
        View::share('adminNotifications', $adminNotifications);
        View::share('count', $count);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
