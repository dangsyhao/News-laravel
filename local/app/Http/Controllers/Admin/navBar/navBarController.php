<?php

namespace App\Http\Controllers\Admin\navBar;

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
        return view('admin.navBar.navBar-add',['post_category'=>$post_category]);
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(),
        [
            'post_category_id' => 'required|max:300',
            'description' => 'required|max:300',
            'url' => 'required|max:300',
            'sort' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $nav_bar = new NavBar;
       
        $nav_bar->post_category_id = $request->post_category_id;
        $nav_bar->description = $request->description;
        $nav_bar->url = route('/')."/".str_slug($request->url)."/".$request->post_category_id;
        $nav_bar->sort = $request->sort;
        $nav_bar->save();
        return redirect()->route('admin.navBar-getNavBar');


    }

    public function getEdit($id)
    {
        $post_category=Post_Category::select('id','value')->get();
        $nav_bar_edit=NavBar::where('id',$id)->paginate('12');

        return view('admin.navBar.navBar-edit',['nav_bar_edit'=>$nav_bar_edit,'post_category'=>$post_category]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'post_category_id' => 'required|max:300',
            'description' => 'required|max:300',
            'url' => 'required|max:300',
            'sort' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.navBar-getEdit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $nav_bar_edit= NavBar::find($request->id);
        $nav_bar_edit->post_category_id = $request->post_category_id;
        $nav_bar_edit->description = $request->description;
        $nav_bar_edit->url = route('/')."/".str_slug($request->url)."/".$request->post_category_id;
        $nav_bar_edit->sort = $request->sort;
        $nav_bar_edit->save();
        return redirect()->route('admin.navBar-getNavBar');

    }

    public function del($id)
    {
        $nav_bar= NavBar::find($id);
        $nav_bar->delete();        
        return redirect()->route('admin.navBar-getNavBar');
    }


}
