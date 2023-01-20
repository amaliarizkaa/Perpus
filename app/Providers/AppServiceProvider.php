<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        //
=======
        // $this->app->bind('path.public', function () {
        //     return realpath(base_path() . '/../public');
        // });
>>>>>>> 7e422aa440e16a0cfdd1688bf921398fc56f89db
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
        // View::share('popular_posts', \App\Models\Artikel::orderBy('views', 'desc')->limit('5')->get());
    }
}
