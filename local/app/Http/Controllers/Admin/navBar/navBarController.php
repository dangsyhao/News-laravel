<?php

namespace App\Http\Controllers\Admin\navBar;

use App\Menu_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $Nav_bar = NavBar::with('getMenuCategoryTable')->paginate('10');
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

        if(!empty($request->url)){
            $Menus->url = $request->url;
            $Menus->post_cat_id = '';
        }elseif(!empty($request->post_cat_id)){
            $Menus->post_cat_id = $request->post_cat_id;
            $post_cat_name = $Menus->getPostCategoryTable()->select('value')->where('id','=',$request->post_cat_id)->get();
            $post_cat_slug = str_slug($post_cat_name[0]->value);
            $Menus->url = '/'.$post_cat_slug.'/?cat_id='.$request->post_cat_id;
        }else{
            $Menus->url = '';
            $Menus->post_cat_id = '';
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
        $Post_cate = Post_Category::select('id','value')->get();
        $Menu_cate = Menu_category::select('id','name')->get();
        return view('admin.navBar.navBar-edit',['Nav_bar'=>$Nav_bar[0],'Post_cate'=>$Post_cate,'Menu_cate'=>$Menu_cate]);
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

        if(!empty($request->url)){
            $Menus->url = $request->url;
            $Menus->post_cat_id = '';
        }elseif(!empty($request->post_cat_id)){
            $Menus->post_cat_id = $request->post_cat_id;
            $post_cat_name = $Menus->getPostCategoryTable()->select('value')->where('id','=',$request->post_cat_id)->get();
            $post_cat_slug = str_slug($post_cat_name[0]->value);
            $Menus->url = '/'.$post_cat_slug.'/?cat_id='.$request->post_cat_id;
        }else{
            $Menus->url = '';
            $Menus->post_cat_id = '';
        }
        $Menus->order = $request->order;
        $Menus->save();

        return redirect()->route('admin.navBar-getNavBar');
    }

    public function del($id)
    {
        $nav_bar= NavBar::find($id);
        $nav_bar->delete();        
        return redirect()->route('admin.navBar-getNavBar');
    }


}
