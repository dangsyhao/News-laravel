<?php

namespace App\Http\Controllers\Admin\navBar;

use App\Menu_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class categoryMenuController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $Cate_menu=Menu_category::paginate(12);

        return view('admin.navBar.category.get-index',['cate_menu'=>$Cate_menu]);
    }

    public function getAdd()
    {
        return view('admin.navBar.category.get-add');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:300|unique:menu_categories',
                'description' => 'required|max:300',
            ]);

        if ($validator->fails()) {
            return redirect()->route('admin.menu.category.getAdd')
                ->withErrors($validator)
                ->withInput();
        }

        $Cate_menu = new Menu_category();
        //
        $Cate_menu->name = $request->name;
        $Cate_menu->description = $request->description;
        $Cate_menu->save();
        return redirect()->route('admin.menu.category.index');

    }

    public function getEdit($id)
    {
        $Cate_menu=Menu_category::where('id',$id)->get();
        return view('admin.navBar.category.get-edit',['Cate_menu'=>$Cate_menu]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:300',
                'description' => 'required|max:300',
            ]);

        if ($validator->fails()) {
            return redirect()->route('admin.menu.category.getEdit',['id'=>$request->id])
                ->withErrors($validator)
                ->withInput();
        }
        //
        $Cate_menu= Menu_category::find($request->id);
        $Cate_menu->name = $request->name;
        $Cate_menu->description = $request->description;
        $Cate_menu->save();
        return redirect()->route('admin.menu.category.index');
    }

    public function delete($id)
    {
        $Cate_menu= Menu_category::find($id);
        $Cate_menu->delete();
        return redirect()->route('admin.menu.category.index');
    }

}
