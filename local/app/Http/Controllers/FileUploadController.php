<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class FileUploadController extends Controller
{
    function index()
    {
        $User = Auth::user();
        //
        if($User->value == 'admin'){
            $imgs = Storage::disk('uploads')->files();
            $imgs_url =array();
            foreach ($imgs as $items){
                $imgs_url[] =  url('local/storage/app/public/uploads/images/'.$items);
            }
        }elseif($User->value == 'Author'){
            $imgs = Storage::disk('users')->files($User->email.'/images/');
            $imgs_url =array();
            foreach ($imgs as $items){
                $imgs_url[] =  url('local/storage/app/public/users/'.$items);
            }
        }else{
            $imgs_url[] = '';
        }
        $view = view('common.image-box-manager',['imgs_url'=>$imgs_url]);
        echo $view;
    }

    function upload(Request $request)
    {
        $User = Auth::user();

        $rules = array(
            'file'  => 'required|image|max:2048'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if($User->value == 'admin'){
            $request->file('file')->store('/','uploads' );

        }elseif ($User->value == 'Author'){
            $request->file('file')->store($User->email.'/images/','users' );
        }else{
            return false;
        }
        $output = array(
            'result' => 'true'
        );

        return response()->json($output);
    }
}
