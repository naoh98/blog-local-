<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        //
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        //
        Schema::defaultStringLength(250);
        //pass data đến tất cả page, kể cả partial
            $menubar = DB::table("category")->get();
            view()->share("menubar",$menubar);
    }
}
