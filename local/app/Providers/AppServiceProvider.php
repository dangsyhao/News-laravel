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
        $Menus = NavBar::with('getMenuCategoryTable');
        $nav_bar= $Menus->get();
        View::share(['nav_bar'=>$nav_bar]);

        // Send Advertise Item to master Layout
        $advertise= Advertise::get();
        View::share(['advertise'=>$advertise]);

         // Send Post Item to master Layout
         $Posts=PostList::with(['getPostCategoryTable','getAuthorByUsersTable'])->where('status','>','1');
                                    
        //Most View
         $most_view= $Posts->orderBy('view','desc')->get();
//         var_dump($most_view);die();
         View::share(['most_view'=>$most_view]);

        //Du lich
        $du_lich= $Posts->where('post_category_id','=','13')->get()->take(-3);
        View::share(['du_lich'=>$du_lich]);

        //Du lich Gallery
        $du_lich_gallery= $Posts->where('post_category_id','=','13')->get()->take(-5);
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
