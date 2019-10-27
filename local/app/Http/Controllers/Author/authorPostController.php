<?php

namespace App\Http\Controllers\author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

use App\Post_Category;
use App\PostList;
use App\Date;
use App\User;


class authorPostController extends Controller
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

    public function getList(Request $request)
    {  
        $post_list=PostList::with(['authorList','postCategory'])->where('author_id','=',$request->user()->id)->paginate('10');
       
        //Filter Controller 
        $post_filter=PostList::with(['authorList','postCategory'])
                                                                    ->where('author_id','=',$request->user()->id)
                                                                    ->select(
                                                                        'id',
                                                                        'author_id',
                                                                        'post_category_id',
                                                                        'status',
                                                                        'view',
                                                                       'updated_at')
                                                                       ->get();
    
   
        $collection=collect($post_filter);

        $post_category_fill=$collection->unique('post_category_id');
        $post_category_fill->all();

        $author_fill=$collection->unique('author_id');
        $author_fill->all();

        $status_fill=$collection->unique('status');
        $status_fill->all();

        $updated_fill=$collection->unique('updated_at');
        $updated_fill->all();

       return view('author.post.post-getList',[
                                                'post_list'=>$post_list,
                                                'post_category_fill'=>$post_category_fill,
                                                'author_fill'=>$author_fill,
                                                'status_fill'=>$status_fill,
                                                'updated_fill'=>$updated_fill,
                                                ]);

    }


    public function show($id)
    {
        $post_content= PostList::where('id','=',$id)->select('content')->get();
    
        return view('author.post.post-show',['post_content'=>$post_content]);
    }

    public function getAdd(Request $request)
    {  
        $post_category=Post_category::select('id','value')->get();
        $image_name = Storage::allFiles($request->user()->email, 'local');

       return view('author.post.post-add',[
                                                'image_name'=>$image_name,
                                                'post_category'=>$post_category
                                            ]);
    
    }


    public function add(Request $request)
    {  
      
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:500',
            'post_category_id' => 'required|max:200',
            'image_avatar' => 'required|max:1000',
            'quotes_content' => 'required|max:3000',
            'editor1' => 'required|max:15000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('author.post-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
   
        
        $post_list= new PostList;
        $post_list->title = $request->title;
        $post_list->post_category_id = $request->post_category_id;
        $post_list->author_id = $request->user()->id;
        $post_list->image_avatar = $request->image_avatar;
        $post_list->quotes_content = $request->quotes_content;
        $post_list->content = $request->editor1;
        $post_list->status = '0';
        $post_list->view = '0';
        $post_list->save();

        $last_id=PostList::select('id')->max('id');
        return redirect()->route('author.postTemp-showDemo',['id'=>$last_id]);
    
    }

    public function filter(Request $request )
    
    {   
        //Put $this Validation >>> If Validation not Use , fill values='none' ! .     
        $filter_1=$request->user()->id;
        $filter_2=$request->post_category_id ;
        $filter_3=$request->status;
        $filter_date=$request->updated_at;
        //Put $this $Field->value >>> If Field not Use , fill values='none' ! .
        $field_1='author_id';    
        $field_2='post_category_id';
        $field_3='status';
        $field_date='updated_at';

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   !=='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   !=='none')
                                                                        ?
                                                                                $post_list=PostList::where([
                                                                                                    [$field_1, '=', $filter_1],
                                                                                                    [$field_2, '=', $filter_2],
                                                                                                    [$field_3, '=', $filter_3],
                                                                                                    [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                        ])->get()
                                                                            :false
                                                                            :false;
                            
        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   !=='none')
                                                                            ||
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   =='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->orWhere($field_1, '=', $filter_1)
                                                                                                    ->get()
                                                                        :false
                                                                        :false;
                
        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   !=='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   =='none')
                                                                            ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->orWhere($field_2, '=', $filter_2)
                                                                                                    ->get()
                                                                        :false
                                                                        :false;

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   !=='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   =='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->orWhere($field_3, '=', $filter_3)
                                                                                                    ->get()
                                                                        :false
                                                                        :false;

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   =='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   !=='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3]
                                                                                                    ])
                                                                                                    ->orWhere($field_date, 'like', '%'.$filter_date.'%')
                                                                                                    ->get()
                                                                        :false
                                                                        :false;

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   =='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   !=='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2]
                                                                                                        
                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->get()
                                                                        :false
                                                                        :false; 

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   =='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   !=='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_3, '=', $filter_3]
                                                                                                        
                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->get()
                                                                        :false
                                                                        :false;

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                            ($filter_1    !=='none')&&
                                                                            ($filter_2   =='none')&&
                                                                            ($filter_3   =='none')&&
                                                                            ($filter_date   !=='none')
                                                                            ||
                                                                            ($filter_1    =='none')&&
                                                                            ($filter_2   !=='none')&&
                                                                            ($filter_3   !=='none')&&
                                                                            ($filter_date   !=='none')
                                                                        ?
                                                                            $post_list=PostList::where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                        
                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3]
                                                                                                    ])
                                                                                                    ->get()
                                                                        :false
                                                                        :false;

        return view('author.post.post-filter',['post_list'=>$post_list]);
    }



}
