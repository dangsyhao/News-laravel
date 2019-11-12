<?php

namespace App\Http\Controllers\Admin\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\PostList;

class postListController extends Controller
{
    public function __construct()
    {
        //
    }
    //
    public function show($id)
    {
        $post_content= PostList::where('id','=',$id)->select('id','content','status')->get();
        return view('admin.post.list.postList-show',['post_content'=>$post_content]);
    }

    //
    public function accept($id)
    {
        PostList::where([['id', '=', $id],['status','=','1']])->update(['status' =>'2']);
        return redirect()->route('admin.post.getPost');
    }

    //
    public function accept_index($id)
    {
        PostList::where('status','=','3')->update(['status' =>'3']);
        PostList::where([['id', '=', $id],['status','=','2']])->update(['status' =>'3']);

        return redirect()->route('admin.post.getPost');
    }

//
    public function del($id)
    {
        $post_category= PostList::find($id);
        $post_category->delete();        
        return redirect()->route('admin.post.getPost');
    }

//
    public function getPostsByFilter(Request $request )
    {
        //get Filter data for filter function
        $post_obj_filter_data = PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
            ->where('status', '>', '0')
            ->paginate('10');
        //
        $post_arr_data = array();
        $k=0;
        foreach ($post_obj_filter_data as $post_obj_filter_item){
            /* get $k */
            $k++;
            $post_arr_data['post_id'][] = $post_obj_filter_item->id;
            $post_arr_data['post_id'] = array_unique($post_arr_data['post_id']);
            //check User
            $getBreak = false;
            for($i=0;$i<$k;$i++){
                if(isset($post_arr_data['users'][$i]['user_id']) && $post_obj_filter_item->getAuthorByUsersTable->id == $post_arr_data['users'][$i]['user_id'])
                {
                    $getBreak = true;
                }
            }
            if(! $getBreak){
                $post_arr_data['users'][$k-1] = ['user_id'=>$post_obj_filter_item->getAuthorByUsersTable->id,'name'=>$post_obj_filter_item->getAuthorByUsersTable->name];
            }
            //check Author Category
            $getBreak = false;
            for($i=0;$i<$k;$i++){
                if(!empty($post_arr_data['post_category_arr'][$i]['post_category_id']) && $post_obj_filter_item->post_category_id == $post_arr_data['post_category_arr'][$i]['post_category_id'])
                {
                    $getBreak = true;
                }
            }
            if(! $getBreak){
                $post_arr_data['post_category_arr'][$k-1] = ['post_category_id'=>$post_obj_filter_item->post_category_id,'post_category_value'=>$post_obj_filter_item->getPostCategoryTable->value];
            }
            //
            $post_arr_data['status'][] = $post_obj_filter_item->status;
            $post_arr_data['status'] = array_unique($post_arr_data['status']);
            $date = $post_obj_filter_item->updated_at->toArray();
            $post_arr_data['updated_at'][] = date('Y-m-d',$date['timestamp']);
            $post_arr_data['updated_at'] = array_unique($post_arr_data['updated_at']);
        }
        //Put $this Validation >>> If Validation not Use , fill values='none' ! .
        $filter_1='none';
        $filter_2='none';
        $filter_3='none';
        $filter_date='none';
        //
        if( ! empty($request->get_post))
        {
            $filter_1=$request->user_id;
            $filter_2=$request->post_category_id ;
            $filter_3=$request->status;
            $filter_date=$request->updated_at;
        }
        //Put $this $Field->value >>> If Field not Use , fill values='none' ! .
        $field_1='user_id';
        $field_2='post_category_id';
        $field_3='status';
        $field_date='updated_at';
        //Begin Filter
        $posts='';
        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)?
                                                                                ($filter_1      =='none')&&
                                                                                ($filter_2      =='none')&&
                                                                                ($filter_3      =='none')&&
                                                                                ($filter_date   =='none')
                                                                            ?
                                                                                $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])->paginate('10')
                                                                            :false
                                                                            :false;

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
                                                                                $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                                ->where([
                                                                                                    [$field_1, '=', $filter_1],
                                                                                                    [$field_2, '=', $filter_2],
                                                                                                    [$field_3, '=', $filter_3],
                                                                                                    [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                        ])->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                            ])
                                                                                            ->orWhere($field_1, '=', $filter_1)
                                                                                            ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->orWhere($field_2, '=', $filter_2)
                                                                                                    ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->orWhere($field_3, '=', $filter_3)
                                                                                                    ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3]
                                                                                                    ])
                                                                                                    ->orWhere($field_date, 'like', '%'.$filter_date.'%')
                                                                                                    ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_2, '=', $filter_2]

                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_3, '=', $filter_3],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_3, '=', $filter_3]

                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']
                                                                                                    ])
                                                                                                    ->paginate('10')
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
                                                                            $posts=PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                                                                            ->where([
                                                                                                        [$field_1, '=', $filter_1],
                                                                                                        [$field_date, 'like', '%'.$filter_date.'%']

                                                                                                    ])
                                                                                                    ->orWhere([
                                                                                                        [$field_2, '=', $filter_2],
                                                                                                        [$field_3, '=', $filter_3]
                                                                                                    ])
                                                                                                    ->paginate('10')
                                                                        :false
                                                                        :false;
        //end Filter
        return view('admin.post.list.postList-getList',
                                                            [   'post_arr_data'=>$post_arr_data,
                                                                'posts'=>$posts
                                                            ]
                    );
        //endFilter Function.

    }

}
