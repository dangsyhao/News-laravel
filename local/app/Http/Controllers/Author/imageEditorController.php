<?php

namespace App\Http\Controllers\author;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class imageEditorController extends Controller
{

    public function imageEditor(Request $request)
    {  
        $image_name = Storage::allFiles($request->user()->email, 'local');

        return view('author.image.image-editor',['image_name'=>$image_name]);
         
    }

    public function upload(Request $request)
    {  

      
        if ($request->hasFile('imageFile'))
        {
            $request->file('imageFile')->store($request->user()->email, 'local');
            

        }

        return redirect()->route('author.imageEditor');
        $image_link = Storage::allFiles($request->user()->email, 'local');
       

    }

    public function del(Request $request)
    {  
      Storage::disk('local')->delete($request->input('image_path'));
      
    return redirect()->route('author.imageEditor');
        
    }
}
