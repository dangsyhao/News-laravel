<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\NavBar;
use App\PostList;
use App\Advertise;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        $this->app->bind('path.public', function()
        {
            return base_path('public_html');
        });
    }
}
