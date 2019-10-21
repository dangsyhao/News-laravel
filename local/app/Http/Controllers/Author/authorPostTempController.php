<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

use App\PostList;
use App\Post_category;


class authorPostTempController extends Controller
{

    public function __construct()
    {
        //
    }

    public function getTemp(Request $request)
    {
    
        $review_content= PostList::with('postCategory')->where([ 
                                        ['author_id','=',$request->user()->id],
                                        ['status','=','0']
                                        ])->paginate('1');
                         
       return view('author.postTemp.postTemp-getTemp',['review_content'=>$review_content]);
    }

    public function showDemo(Request $request ,$id)
    {
    
        $review_content= PostList::where([ 
                                        ['id','=',$id],
                                        ['author_id','=',$request->user()->id],
                                        ['status','=','0']
                                        ])->select('id','content')->get();
    

        return view('author.postTemp.postTemp-showDemo',['review_content'=>$review_content]);
    }


    public function getEdit(Request $request,$id)
    {  
        $post_list=PostList::with('postCategory')->where('id','=',$id)->get();
        $post_category=Post_category::select('id','value')->get();
        $image_name = Storage::allFiles($request->user()->email, 'local');

       return view('author.postTemp.postTemp-getEdit',[
                                                'post_list'=>$post_list,
                                                'post_category'=>$post_category,
                                                'image_name'=>$image_name
                                            ]);
    
    }

    public function edit(Request $request)
    {  
      
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:500',
            'post_category_id' => 'required|max:200',
            'image_avatar' => 'required|max:500',
            'quotes_content' => 'required|max:1000',
            'editor1' => 'required|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('author.post-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
   
        
        $post_list= PostList::find($request->id);
        $post_list->title = $request->title;
        $post_list->post_category_id = $request->post_category_id;
        $post_list->author_id = $request->user()->id;
        $post_list->image_avatar = $request->image_avatar;
        $post_list->quotes_content = $request->quotes_content;
        $post_list->content = $request->editor1;
        $post_list->status = '0';
        $post_list->view = '0';
        $post_list->save();

        return redirect()->route('author.postTemp-showDemo',['id'=>$request->id]);
    
    }


    public function delTemp($id)
    {
        PostList::where('id', '=', $id)->delete();

        return redirect()->route('author.postTemp-getTemp');
    }
    

    public function update($id)
    {
        PostList::where('id', '=', $id)->update(['status' =>'1']);

        return redirect()->route('author.post-getList');
    }

    

}
