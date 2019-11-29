<?php

namespace App\Http\Controllers\Admin\navBar;

use App\Menu_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\NavBar;
use App\Post_Category;


class navBarController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getNavBar(Request $request )
    {

        $Nav_bar_obj = new NavBar;
        $Menu_cat = Menu_category::select('id','name')->get();
        if(! empty($request->menu_cat_id)){
            $Nav_bar = $Nav_bar_obj->with('getMenuCategoryTable')
                                    ->where('menu_cat','=',$request->menu_cat_id)
                                    ->orderBy('order','asc')->get();
        }else{
            $Nav_bar = $Nav_bar_obj->with('getMenuCategoryTable')->orderBy('order','asc')->get();
            $Nav_bar= $Nav_bar->first()[0];
        }
        return view('admin.navBar.navBar-getNavBar',['Nav_bar'=>$Nav_bar,'Menu_cat'=>$Menu_cat]);
    }

    public function getAdd()
    {   
       $post_category=Post_Category::select('id','post_cat_name')->get();
        $Menu_cate = Menu_category::select('id','name')->get();

        return view('admin.navBar.navBar-add',['post_category'=>$post_category,'Menu_cate'=>$Menu_cate]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'menu_cat' => 'required|max:225',
            'menu_name' => 'required|max:225',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $Menus = new NavBar;
        //
        $Menus->menu_cat = $request->menu_cat;
        $Menus->menu_name = $request->menu_name;

        if(!empty($request->link)){
            $Menus->link = $request->link;
            $Menus->page_link = $request->link;
            $Menus->post_cat_id = '';
        }else{
            $Menus->post_cat_id = $request->post_cat_id;
            $post_cat_name = $Menus->getPostCategoryTable()->select('post_cat_name')->where('id','=',$request->post_cat_id)->get();
            $post_cat_slug = str_slug($post_cat_name[0]->post_cat_name);
            $Menus->page_link = '/'.$post_cat_slug.'?cat_id='.$request->post_cat_id.'&post_type=page_archive';
            $Menus->link = '';
        }
        //set order
        $order = $Menus->select('order')->where('menu_cat',$request->menu_cat)->get();
        $Menus->order = $order->pluck('order')->count() > 0 ? max($order->toArray())['order'] + 1 : 1;
        $Menus->save();

        return redirect()->route('admin.navBar-getNavBar');
    }

    public function getEdit($id)
    {
        $Menus= new NavBar;
        $current_menu = $Menus->find($id);
        $orders= $Menus->select('order')->where('menu_cat',$current_menu->menu_cat)->orderBy('order','asc')->get();
        $Post_cate = Post_Category::select('id','post_cat_name')->get();
        $Menu_cate = Menu_category::select('id','name')->get();
        return view('admin.navBar.navBar-edit',['current_menu'=>$current_menu,'Post_cate'=>$Post_cate,'Menu_cate'=>$Menu_cate,'orders'=>$orders]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|max:225',
            'menu_cat' => 'required|max:225',
            'menu_name' => 'required|max:225'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $Menus= NavBar::find($request->id);
        //
        $Menus->menu_cat = $request->menu_cat;
        $Menus->menu_name = $request->menu_name;

        if(!empty($request->link)){
            $Menus->link = $request->link;
            $Menus->page_link = $request->link;
            $Menus->post_cat_id = '';
        }else{
            $Menus->post_cat_id = $request->post_cat_id;
            $post_cat_name = $Menus->getPostCategoryTable()->select('post_cat_name')->where('id','=',$request->post_cat_id)->first();
            $post_cat_slug = str_slug($post_cat_name->post_cat_name);
            $Menus->page_link = '/'.$post_cat_slug.'?cat_id='.$request->post_cat_id.'&post_type=page_archive';
            $Menus->link = '';
        }

        $current_order = $Menus->order;
        $request_order = $request->order;

        if($request_order == $current_order){
            $Menus->order = $request_order;
        }else {
            //Mặc định order value tuân theo dãy số tự nhiên liên tục từ 1 ->n
            if ($request_order > $current_order) {
                $new_menu = NavBar::where([['order','<=',$request_order],['menu_cat',$request->menu_cat]])->orderBy('order','asc');
                $ids =$new_menu->pluck('id')->toArray();
                for ($i = $request_order; $i > $current_order ; $i--) {
                    $k = $request_order - ($request_order - $i) - 1;
                    NavBar::where([['id','=',$ids[$i-1]],['menu_cat',$request->menu_cat]])->update(['order'=>$k]);
                }
                $Menus->order = $request_order;
            }
            //
            if ($request_order < $current_order) {
                $new_menu = NavBar::orderBy('order','asc');
                $ids =$new_menu->pluck('id')->toArray();
                $m = 0;
                for ($i = $request_order; $i < $current_order  ; $i++) {
                    $m++;
                    NavBar::where([['id','=',$ids[$i-1]],['menu_cat',$request->menu_cat]])->update(['order'=>$request_order + $m]);
                }
                $Menus->order = $request_order;
            }
        }
        $Menus->save();
        return redirect()->route('admin.navBar-getNavBar');
    }

    public function del($id)
    {
        $menu= NavBar::find($id);
        $menu_cat = '';
        if(!empty($menu)){
            $menu_cat = $menu->menu_cat;
            $menu->delete();
        }else{
            return redirect()->route('admin.navBar-getNavBar');
        }
        //Thiết lập lại số thứ tự .
        $Menus = NavBar::select('id','order')->where('menu_cat',$menu_cat)->orderBy('order','asc')->get();
        $order_arr = $Menus->pluck('order')->toArray();
        $ids =  $Menus->pluck('id')->toArray();
        $max_order = count($order_arr) > 0 ? max($order_arr) : 0;
        $key = 0;
        //
        if($max_order > 0){
            for($i = 1; $i<= $max_order; $i++){
                if( isset($order_arr[$key]) && $order_arr[$key] == $i){
                    $key ++;
                    continue;
                }else{
                    if( isset($order_arr[$key])){
                        NavBar::where([['id',$ids[$key]],['menu_cat',$menu_cat]])->update(['order'=>$i]);
                        $key ++;
                    }else{
                        break;
                    }
                }
            }
        }
        return redirect()->back();
    }
}
