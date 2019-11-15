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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNavBar(Request $request )
    {
        $Nav_bar = NavBar::with('getMenuCategoryTable')->orderBy('order','asc')->paginate('10');
        $Menu_cat = Menu_category::select('id','name')->get();

        if(isset($request->menu_cat_id)){
            $Nav_bar = $Nav_bar->where('menu_cat','=',$request->menu_cat_id);
        }else{
            $Nav_bar = $Nav_bar->groupBy('menu_cat')->first();
        }
        return view('admin.navBar.navBar-getNavBar',['Nav_bar'=>$Nav_bar,'Menu_cat'=>$Menu_cat]);
    }

    public function getAdd()
    {   
       $post_category=Post_Category::select('id','value')->get();
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
            $post_cat_name = $Menus->getPostCategoryTable()->select('value')->where('id','=',$request->post_cat_id)->get();
            $post_cat_slug = str_slug($post_cat_name[0]->value);
            $Menus->page_link = '/'.$post_cat_slug.'/?cat_id='.$request->post_cat_id;
            $Menus->link = '';
        }

        $order = $Menus->select('order')->get();
        $Menus->order = !empty($order[0]->order) ? max($order->toArray())['order'] + 1 : 1;
        $Menus->save();

        return redirect()->route('admin.navBar-getNavBar');
    }

    public function getEdit($id)
    {
        $Nav_bar=NavBar::with(['getPostCategoryTable','getMenuCategoryTable'])
                        ->where('id','=',$id)->paginate('12');
        $orders= NavBar::select('order')->orderBy('order','asc')->get();
        $Post_cate = Post_Category::select('id','value')->get();
        $Menu_cate = Menu_category::select('id','name')->get();
        return view('admin.navBar.navBar-edit',['Nav_bar'=>$Nav_bar[0],'Post_cate'=>$Post_cate,'Menu_cate'=>$Menu_cate,'orders'=>$orders]);
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
            $post_cat_name = $Menus->getPostCategoryTable()->select('value')->where('id','=',$request->post_cat_id)->get();
            $post_cat_slug = str_slug($post_cat_name[0]->value);
            $Menus->page_link = '/'.$post_cat_slug.'/?cat_id='.$request->post_cat_id;
            $Menus->link = '';
        }

        $current_order = $Menus->order;
        $request_order = $request->order;

        if($request_order == $current_order){
            $Menus->order = $request_order;
        }else {
            //Mặc định order value tuân theo dãy số tự nhiên liên tục từ 1 ->n
            if ($request_order > $current_order) {
                $new_menu = NavBar::where('order','<=',$request_order)->orderBy('order','asc');
                $ids =$new_menu->pluck('id')->toArray();
                for ($i = $request_order; $i > $current_order ; $i--) {
                    $k = $request_order - ($request_order - $i) - 1;
                    NavBar::where('id','=',$ids[$i-1])->update(['order'=>$k]);
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
                    NavBar::where('id','=',$ids[$i-1])->update(['order'=>$request_order + $m]);
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

        if(!empty($menu)){
            $menu->delete();
        }else{
            return redirect()->route('admin.navBar-getNavBar');
        }
        //Thiết lập lại số thứ tự .
        $Menus = NavBar::select('id','order')->orderBy('order','asc')->get();
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
                        NavBar::where('id','=',$ids[$key])->update(['order'=>$i]);
                        $key ++;
                    }else{
                        break;
                    }
                }
            }
        }
        return redirect()->route('admin.navBar-getNavBar');
    }
}
