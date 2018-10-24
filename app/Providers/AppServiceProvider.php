<?php

namespace App\Providers;

use App\Category;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Set the app locale according to the URL
        app()->setLocale($request->segment(1));

        $user = User::where('username', $request->username)->first();
        if ($user != NULL) {
            if ($user->status == 1) {
                abort(403);
            }
        }

        view()->composer('layouts.app', function ($view) {
            $categories = Category::getCategory()->get();
            $view->with('categories', $categories);
        });
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
