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
    public function getNavBar()
    {  
        $nav_bar_list=NavBar::paginate(12);
 
        return view('admin.navBar.navBar-getNavBar',['nav_bar_list'=>$nav_bar_list]);
    
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
            'description' => 'required|max:1000',
            'sort' => 'required|max:25',
            'menu_cate' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $Menus = new NavBar;
        //
        $Menus->menu_cat = $request->menu_cate;
        if(!empty($request->post_category_id)){
            $Menus->post_category_id = $request->post_category_id;
            $Menus->url = "/?category=".$request->post_category_id;
        }else{
            $Menus->post_category_id = '';
        }
        if(isset($request->url)){
            $Menus->url = $request->url;
        }else{
            $Menus->url = '';
        }
        $Menus->description = $request->description;
        $Menus->sort = $request->sort;
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
            'description' => 'required|max:1000',
            'sort' => 'required|max:225',
            'menu_cate' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $Nav_bar= NavBar::find($request->id);
        //
        if(isset($request->post_category_id)){
            $Nav_bar->post_category_id = $request->post_category_id;
            $Nav_bar->url = "/?category=".$request->post_category_id;
        }
        if(isset($request->url)){
            $Nav_bar->url = $request->url;
        }
        $Nav_bar->description = $request->description;
        $Nav_bar->sort = $request->sort;
        $Nav_bar->menu_cat = $request->menu_cate;

        $Nav_bar->save();
        return redirect()->route('admin.navBar-getNavBar');

    }

    public function del($id)
    {
        $nav_bar= NavBar::find($id);
        $nav_bar->delete();        
        return redirect()->route('admin.navBar-getNavBar');
    }


}
