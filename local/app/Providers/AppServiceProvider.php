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

        // Send NavBar Item to master Layout
        $nav_bar=NavBar::all();
        View::share(['nav_bar'=>$nav_bar]);

        // Send Advertise Item to master Layout
        $advertise=Advertise::all();
        View::share(['advertise'=>$advertise]);


         // Send Post Item to master Layout
         $post_list=PostList::select(
                                    'id',
                                    'title',
                                    'updated_at',
                                    'image_avatar',
                                    'post_category_id'
                                    )->where('status','>','1')->get();
                                    
         $collection=collect($post_list);
        //Most View
         $most_view= $collection->sortByDesc('view')->take(10);
         $most_view->all();
         View::share(['most_view'=>$most_view]);

        //Du lich
        $du_lich= $collection->where('post_category_id','=','13')->take(-3);
        $du_lich->all();
        View::share(['du_lich'=>$du_lich]);

        //Du lich Gallery
        $du_lich_gallery= $collection->where('post_category_id','=','13')->take(-5);
        $du_lich_gallery->all();
        View::share(['du_lich_gallery'=>$du_lich_gallery]);

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
