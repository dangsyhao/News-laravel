<?php

namespace App\Http\Controllers;

use App\File;
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
        $User = Auth::user();
        //
        $files_url =array();
        $users_id = $User::where('value',$User->value)->get();
        $Files = File::whereIn('user_id',$users_id->toArray())->orderBy('updated_at','desc')->get();
        $Files_arr = $Files->toArray();
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
        $view = view('common.image-box-manager',['Files'=>$Files]);
        echo $view;
    }

    function upload(Request $request)
    {
        $User = Auth::user();
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
        if($User->value == 'admin'){
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
                $Files->user_id =   $User->id;
                $Files->save();
            }

        }elseif ($User->value == 'Author'){
            //
            $CheckFile = Storage::disk('users');
            $request->file('file')->store($User->email.'/images/','users' );
            $file_hashName = $file_request->hashName();
            $exists = $CheckFile->url($file_hashName);
            if($exists){
                $Files->file_url = Storage::disk('users')->url($User->email.'/'.$file_hashName);
                $Files->file_name = $file_hashName;
                $Files->file_extension = $file_request->getClientMimeType();
                $Files->file_size = $file_request->getClientSize();
                $Files->user_id = $User->id;
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

        $User = Auth::user();
        $file_id = isset($request->id) ? $request->id :'';
        //
        if(! isset($request->id)){
            $output = array(
                'result' => 'fail'
            );

        }
        $Files = File::find($file_id);

        if(isset($Files)){
            $file_url = $Files->file_url;

            Storage::delete($file_url);

            if( ! Storage::exists($file_url)){
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
