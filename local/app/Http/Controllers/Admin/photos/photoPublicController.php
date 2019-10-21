<?php

namespace App\Http\Controllers\admin\photos;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class photoPublicController extends Controller
{

    public function getList(Request $request)
    {  
        $image_name = Storage::allFiles('public/', 'local');
        return view('admin.photos.photos-getList',['image_name'=>$image_name]);

         
    }

    public function upload(Request $request)
    {  

      
        if ($request->hasFile('imageFile'))
        {
            $request->file('imageFile')->store('images', 'public');
            
        }

        return redirect()->route('admin.photos-getList');
       

    }

    public function del(Request $request)
    {  
      Storage::disk('local')->delete($request->input('image_path'));
      
    return redirect()->route('admin.photos-getList');
        
    }
}
