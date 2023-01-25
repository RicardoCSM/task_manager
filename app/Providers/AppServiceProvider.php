<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

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
        View::composer('app.layouts._partials.header', function ($view) {
            $email = $_SESSION['email'];
            $user = User::where('email', $email)->first();

            $view->with('name', $user->name);
        });

        Paginator::useBootstrap();
    }
}
