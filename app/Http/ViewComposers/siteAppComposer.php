<?php


namespace App\Http\ViewComposers;

use App\Advertise;
use App\Menu_category;
use App\NavBar;
use App\Post_Category;
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
        $Posts_cat = new Post_Category;
        $Post_cat_slug = $Posts_cat->select('id','post_cat_slug')->get();
        $post_data_sidebar = collect();

        //GLOBAL $Posts variable.
        $Posts = $Posts_obj->with(['getPostCategoryTable','getAuthorByUsersTable'])->get();
        if($Posts->count() > 0){
            $view->with('Posts',$Posts);
        }

        //Most View
        $most_view= $Posts_obj->where('status','>','1')->orderBy('view','desc')->get()->take(10);
        if($most_view->count() > 0){
            $post_data_sidebar = $post_data_sidebar->put('most_view',$most_view);
        }

        //Block Du Lich Da Nang
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'du-lich-da-nang';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $dulich= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(10);
        $dulich = $dulich->count() > 0 ? $dulich : '';
        $post_data_sidebar = $post_data_sidebar->put('du_lich',$dulich);

        //Block Ban Doc
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'ban-doc';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $bandoc= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(10);
        $bandoc = $bandoc->count() > 0 ? $bandoc : '';
        $post_data_sidebar = $post_data_sidebar->put('ban_doc',$bandoc);

        //
        $view->with('post_data_sidebar',$post_data_sidebar);

    }

}