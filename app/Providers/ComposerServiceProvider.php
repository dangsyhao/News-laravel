<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Render data to view :layout-master.dashboard.app
        View::composer(
            'layout-master.dashboard.app', 'App\Http\ViewComposers\AppComposer'
        );

        // Render data to view :site.app
        View::composer(
            'site.*', 'App\Http\ViewComposers\siteAppComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
