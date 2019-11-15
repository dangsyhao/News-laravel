<?php

namespace App\Http\Controllers;

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
        if($User->value == 'admin'){
            $Files = Storage::disk('uploads')->files();
            $first_key = 0;
            $sub_key = 0;
            for($i = 0;$i< count($Files);$i++){
                $extension =  pathinfo($Files[$i], PATHINFO_EXTENSION);
                $files_url[$first_key][$sub_key] = ['url'=>url('local/storage/app/public/uploads/images/'.$Files[$i]),
                    'ext'=> $extension
                ];
                $sub_key++;
                //reset
                if($sub_key === $column){
                    $sub_key = 0;
                    $first_key +=1;
                }
            }

        }elseif($User->value == 'Author'){
            $Files = Storage::disk('users')->files($User->email.'/images/');
            $first_key = 0;
            $sub_key = 0;
            for($i = 0;$i< count($Files);$i++){
                $extension =  pathinfo($Files[$i], PATHINFO_EXTENSION);
                $files_url[$first_key][$sub_key] = ['url'=>url('local/storage/app/public/users/'.$Files[$i]),
                    'ext'=> $extension
                ];
                $sub_key++;
                //reset
                if($sub_key === 4){
                    $sub_key = 0;
                    $first_key +=1;
                }
            }
        }else{
            $files_url[] = '';
        }
        return $files_url;
    }

    public function getFilesManagerIndex()
    {
        $files_url = $this->getFilesData( 4);
        return view('common.file-index',['Files'=>$files_url]);
    }
    //
    function getUploadFilesBoxIndex()
    {
        $Files = $this->getFilesData(1);
        $view = view('common.image-box-manager',['Files'=>$Files]);
        echo $view;
    }

    public function getResultFilesManagerByAjax()
    {
        $files_url = $this->getFilesData(4);
        $html ='';
        foreach($files_url as $key) {
            $html .= '<tr role="row" >';
            foreach ($key as $value) {
                $html .= '<td class="file-upload-items" id="file-upload-items">';
                if ($value['ext'] !== 'pdf') {
                    $html .= '<a href="' . $value['ext'] . '" target="_blank">';
                    $html .= '<img src="' . $value['url'] . '" alt="images" title="Click-to-view-image" height="90px" width="125px">';
                    $html .= '</a>';
                    $html .= '<a class="remImage" href="#" id="delete" >';
                    $html .= '<img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:40px;height:40px;">';
                    $html .= '</a>';

                } else {
                    $html .= '<a href="' . $value['ext'] . '" target="_blank">';
                    $html .= '<img src="' . url('local/storage/app/public/uploads/images/4GpxTgmKHNBBJwOiq7XYoAYsnySqB0cRK221f4Zw.png') . '" alt="pdf-file" title="Click-PDF-file"  height="90px" width="125px">';
                    $html .= '</a>';
                    $html .= '<a class="remImage" href="#" id="delete">';
                    $html .= '<img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:40px;height:40px;">';
                    $html .= '</a>';
                }
                $html .= '</td>';
            }
            $html .= '</tr>';
        }
        echo $html;
    }

    function upload(Request $request)
    {
        $User = Auth::user();

        $rules = array(
            'file'  => 'required|mimes:jpeg,bmp,png,pdf,doc|max:5140',
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
