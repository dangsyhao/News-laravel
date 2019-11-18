<?php

namespace App\Http\Controllers\Admin\post;

use App\Post_Category;
use App\User;
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
        $post_content= PostList::select('id','content','status')->where('id','=',$id)->get();
        return view('admin.post.list.postList-show',['post_content'=>$post_content]);
    }
    //
    public function accept($id)
    {
        if(isset($id)){
            PostList::where([['id', '=', $id],['status','=','1']])->update(['status' =>'2']);
        }
        return redirect()->route('admin.post.getPost');
    }

    //
    public function accept_index($id)
    {
        if(isset($id)){
            $Posts = new PostList;

            $Posts_query = $Posts->where('status','3');
            //
            if(count($Posts_query->get()->pluck('id')) > 0){
                $Posts_query->update(['status'=>'2']);
            }
            //
            $Posts_query = PostList::where([['id',$id],['status','2']]);
            //
            if(count($Posts_query->get()->pluck('id')) > 0){
                $Posts_query->update(['status'=>'3']);
            }
        }

        return redirect()->route('admin.post.getPost');
    }

//
    public function del($id)
    {
        if(isset($id)){
            $post_category= PostList::find($id);
            if (isset($post_category->id) && $post_category->status !== '3'){
                $post_category->delete();
            }
        }

        return redirect()->route('admin.post.getPost');
    }

//
    public function getPostsByFilter(Request $request )
    {
        //get Filter data for filter function
        $post_obj_filter_data = PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
            ->where('status', '>', '0')
            ->get();
        //
        $Authors = User::select('id','name')->whereIn('id',$post_obj_filter_data->pluck('user_id'))->get();
        $Post_cats = Post_Category::select('id','post_cat_name')->whereIn('id',$post_obj_filter_data->pluck('post_category_id'))->get();
        $post_info = array();
        foreach ($post_obj_filter_data as $items){
            //
            $post_info['status'][] = $items->status;
            $post_info['status'] = array_unique($post_info['status']);
            //
            $date = $items->updated_at->toArray();
            $post_info['updated_at'][] = date('Y-m-d',$date['timestamp']);
            $post_info['updated_at'] = array_unique($post_info['updated_at']);
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
                                                            [   'post_info'=>$post_info,
                                                                'Authors'=>$Authors,
                                                                'Post_cats'=>$Post_cats,
                                                                'posts'=>$posts
                                                            ]
                    );

        /** endFilter Function.** */
    }

}
