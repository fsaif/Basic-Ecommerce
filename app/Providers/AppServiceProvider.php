<?php

namespace App\Providers;

use App\Category;
use App\Currency;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        Schema::defaultStringLength(191);

        // Set the app locale according to the URL
        app()->setLocale($request->segment(1));

        // $user = User::where('username', $request->username)->first();
        // if ($user != NULL) {
        //     if ($user->status == 1) {
        //         abort(403);
        //     }
        // }

        view()->composer('layouts.app', function ($view) {
            $categories = Category::getCategory()->get();
            $currencies = Currency::all();
            $currencyID = Session::get('currency');
            $dd = Currency::find($currencyID)->shortcut;
            $view->with('categories', $categories)
                ->with('currencies', $currencies)
                ->with('dd',$dd);
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
