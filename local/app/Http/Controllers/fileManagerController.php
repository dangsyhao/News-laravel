<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use App\User_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class fileManagerController extends Controller
{

    function __construct()
    {
        //
    }

    public function getFilesData($column = 1)
    {
        $Auth = Auth::user();
        $User = new User;
        $Files = new File;
        //
        $files_url =array();
        if($Auth->User_category->user_role == 'admin'){
            $users_id = $User->select('id')->whereIn('user_cat_id',User_category::where('user_role','admin')->get()->pluck('id')->toArray())
                        ->get()->toArray();
            $files = $Files->whereIn('user_id',$users_id)->orderBy('updated_at','desc')->get();
        }
        if($Auth->User_category->user_role == 'author'){
            $files = $Files->where('user_id',$Auth->id)->orderBy('updated_at','desc')->get();
        }

        $Files_arr = $files->toArray();
        //
        $first_key = 0;
        $sub_key = 0;
        for($i = 0;$i< count($Files_arr);$i++){
            $files_url[$first_key][$sub_key] = $Files_arr[$i];
            $sub_key++;
            //reset
            if($sub_key == $column){
                $sub_key = 0;
                $first_key +=1;
            }
        }

        return $files_url;
    }

    public function getFilesManagerIndex()
    {
        $files_url = $this->getFilesData( 4);
        return view('common.file-manager.file-index',['Files'=>$files_url]);
    }
    //
    public function getResultFilesManagerByAjax()
    {
        $files_url = $this->getFilesData(4);
        return view('common.file-manager.files-result-ajax',['Files'=>$files_url]);
    }
    //
    function getUploadFilesBoxIndex()
    {
        $Files = $this->getFilesData(1);
        $view = view('common.box-upload.image-box-manager',['Files'=>$Files]);
        echo $view;
    }

    function upload(Request $request)
    {
        $Auth = Auth::user();
        //
        $rules = array(
            'file'  => 'required|mimes:jpeg,bmp,png,pdf,doc|max:5140',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //Store Files
        $Files = new File;
        $file_request = $request->file('file');
        //
        if($Auth->User_category->user_role == 'admin'){
            //
            $CheckFile = Storage::disk('uploads');
            $file_request->store('/','uploads' );
            $file_hashName = $file_request->hashName();
            $exists = $CheckFile->url($file_hashName);
            if($exists){
                $Files->file_url = Storage::disk('uploads')->url($file_hashName);
                $Files->file_name = $file_hashName;
                $Files->file_extension = $file_request->getClientMimeType();
                $Files->file_size = $file_request->getClientSize();
                $Files->user_id = $Auth->id;
                $Files->save();
            }

        }elseif ($Auth->User_category->user_role == 'author'){
            //
            $CheckFile = Storage::disk('users');
            $request->file('file')->store('/'.$Auth->email,'users' );
            $file_hashName = $file_request->hashName();
            $exists = $CheckFile->url($file_hashName);
            if($exists){
                $Files->file_url = Storage::disk('users')->url($Auth->email.'/'.$file_hashName);
                $Files->file_name = $file_hashName;
                $Files->file_extension = $file_request->getClientMimeType();
                $Files->file_size = $file_request->getClientSize();
                $Files->user_id = $Auth->id;
                $Files->save();
            }
        }else{
            return false;
        }
        //
        $output = array(
            'result' => 'true'
        );
        return response()->json($output);
    }

    function delete(Request $request){

        $Auth = Auth::user();
        $file_id = isset($request->id) ? $request->id :'';
        //
        if(! isset($request->id)){
            $output = array(
                'result' => 'fail'
            );
            return response()->json($output);
        }
        $Files = File::find($file_id);

        if(isset($Files)){
            $file_name = $Files->file_name;
            Storage::disk('uploads')->delete($file_name);
            if(! Storage::disk('uploads')->exists($file_name)){
                $Files->delete();
            }
        }
        //
        $output = array(
            'result' => 'success'
        );

        return response()->json($output);
    }

}
