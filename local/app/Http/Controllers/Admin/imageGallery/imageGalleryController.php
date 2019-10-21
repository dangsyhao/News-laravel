<?php

namespace App\Http\Controllers\Admin\imageGallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Advertise;
use App\ImageGallery;

class imageGalleryController extends Controller
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
    public function getList()
    {  
        $image_gallery_list=ImageGallery::paginate(12);
 
        return view('admin.imageGallery.imageGallery-getList',['image_gallery_list'=>$image_gallery_list]);
    
    }


    public function getAdd()

    {   
        $image_name = Storage::allFiles('public/', 'local');
        return view('admin.imageGallery.imageGallery-add',['image_name'=>$image_name]);
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'image_category' => 'required|max:300',
            'image_url' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.imageGallery-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $image_gallery = new ImageGallery;
       
        $image_gallery->image_category= $request->image_category;
        $image_gallery->image_url = $request->image_url;
        $image_gallery->save();
        return redirect()->route('admin.imageGallery-getList');

    }

    public function getEdit($id)
    {
        $image_gallery_edit=ImageGallery::where('id',$id)->paginate('12');
        $image_name = Storage::allFiles('public/', 'local');
        return view('admin.imageGallery.imageGallery-edit',['advertise_edit'=>$image_gallery_edit,'image_name'=>$image_name]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'image_category' => 'required|max:300',
            'image_url' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.imageGallery-getEdit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $image_gallery= ImageGallery::find($request->id);
        $image_gallery->image_category = $request->image_category;
        $image_gallery->image_url = $request->image_url;
        $image_gallery->save();
        return redirect()->route('admin.imageGallery-getList');

    }

    public function read($id)
    {
        $image_url= ImageGallery::where('id','=',$id)->get();
                
        return view('admin.imageGallery-read',['image_url'=>$image_url]);
    }

    public function del($id)
    {
        $image_gallery= ImageGallery::find($id);
        $image_gallery->delete();        
        return redirect()->route('admin.imageGallery-getList');
    }


}
