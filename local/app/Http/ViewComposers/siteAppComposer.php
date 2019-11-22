<?php


namespace App\Http\ViewComposers;

use App\Advertise;
use App\Menu_category;
use App\NavBar;
use App\PostList;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class siteAppComposer
{
    public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        // Menus
        $Menus_obj = new NavBar;
        //Main Menus
        $Menus = collect();
        $Menus_query= $Menus_obj->whereIn('menu_cat',Menu_category::where('name','Main Menu')->get()->pluck('id'))->orderBy('order','asc')->get();
        if($Menus_query->count() > 0 ){
            $Menus = $Menus->put('main-menu',$Menus_query);
        }
        //Head Menus
        $Menus_query= $Menus_obj->whereIn('menu_cat',Menu_category::where('name','Head Menu')->get()->pluck('id'))->orderBy('order','asc')->get();
        if($Menus_query->count() > 0 ){
            $Menus = $Menus->put('head-menu',$Menus_query);
        }
        $view->with('Menus',$Menus);

        //Advertise
        $Adv = new Advertise;
        $advertise= $Adv->orderBy('updated_at','desc')->get();
        if($advertise->count() > 0){
            $view->with('advertise',$advertise);
        }

        //Posts OBJ
        $Posts_obj = new PostList;

        //get Posts object data for all site template .
        $Posts = $Posts_obj->with(['getPostCategoryTable','getAuthorByUsersTable'])->get();
        if($Posts->count() > 0){
            $view->with('Posts',$Posts);
        }

        //Most View
        $most_view= $Posts_obj->where('status','>','1')->orderBy('view','desc')->get();
        if($most_view->count() > 0){
            $view->with('most_view',$most_view);
        }
        //Du lich
        $du_lich= $Posts_obj->where([['status','>','1'],['post_category_id','=','13']])->orderBy('updated_at','desc')->get();
        if($du_lich->count() > 0){
            $du_lich_take = $du_lich->take(-3);
            view('du_lich',$du_lich_take);
        }
        //Du lich Gallery
        if($du_lich->count() > 0){
            $du_lich_take = $du_lich->take(-5);
            view('du_lich_gallery',$du_lich_take);
        }

    }

}