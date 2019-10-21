<?php

namespace App\Http\Controllers\Admin\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\User;
use App\PostList;
use App\Date;

class postListController extends Controller
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
        $post_list=PostList::with(['authorList','postCategory'])->where('status','>','0')->paginate('10');
        

        
        //Filter Controller 
        $post_filter=PostList::with(['authorList','postCategory'])
                                                                ->where('status','>','0')
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

       return view('admin.post.list.postList-getList',[
                                                        'post_list'=>$post_list,
                                                        'post_category_fill'=>$post_category_fill,
                                                        'author_fill'=>$author_fill,
                                                        'status_fill'=>$status_fill,
                                                        'updated_fill'=>$updated_fill,
                                                        ]);
  
       }



    public function show($id)
    {
        $post_content= PostList::where('id','=',$id)->select('id','content','status')->get();
    
        return view('admin.post.list.postList-show',['post_content'=>$post_content]);
    }



    public function accept($id)
    {
        PostList::where([['id', '=', $id],['status','=','1']])->update(['status' =>'2']);

        return redirect()->route('admin.postList-getList');
    }

    public function accept_index($id)
    {
        PostList::where('status','=','3')->update(['status' =>'3']);
        PostList::where([['id', '=', $id],['status','=','2']])->update(['status' =>'3']);

        return redirect()->route('admin.postList-getList');
    }



    public function del($id)
    {
        $post_category= PostList::find($id);
        $post_category->delete();        
        return redirect()->route('admin.postList-getList');
    }
    


    public function filter(Request $request )
    
    {   
        //Put $this Validation >>> If Validation not Use , fill values='none' ! .     
        $filter_1=$request->author_id;
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

        return view('admin.post.list.postList-filter',['post_list'=>$post_list]);
    }




    

}
