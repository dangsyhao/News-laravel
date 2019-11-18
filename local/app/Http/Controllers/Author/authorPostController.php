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

    public function getPostsByFilter(Request $request )
    {
        $Auth = Auth::user();
        //get Filter data for filter function
        $post_obj_filter_data = PostList::with(['getAuthorByUsersTable', 'getPostCategoryTable'])
                                            ->where('user_id',$Auth->id)
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
        $filter_1= $Auth->id;
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
        $posts = '';
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

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date) ?
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

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)   ?
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

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date)   ?
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

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date) ?
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

        isset($filter_1)&&isset($filter_2)&&isset($filter_3)&&isset($filter_date) ?
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
        return view('author.post.post-getList',
                                                    [   'post_info'=>$post_info,
                                                        'Authors'=>$Authors,
                                                        'Post_cats'=>$Post_cats,
                                                        'posts'=>$posts
                                                    ]
        );

        /** endFilter Function.** */
    }

    public function show($id)
    {
        $post_content= PostList::with('getAuthorByUsersTable')->where('id','=',$id)->first();
        if($post_content ->count() > 0){
            return view('author.post.post-show',['post_content'=>$post_content]);
        }
        return redirect()->back();

    }

    public function getAdd()
    {  
        $post_category=Post_category::select('id','post_cat_name')->get();
        if($post_category->count() > 0){
            return view('author.post.post-add',['post_category'=>$post_category]);
        }
        return redirect()->back();
    }

    public function add(Request $request)
    {  
      if(isset($request)){
          $validator = Validator::make($request->all(), [
              'title' => 'required|max:1000',
              'post_category_id' => 'required|max:500',
              'image_avatar' => 'required|max:1000',
              '_content' => 'required|max:15000',
          ]);

          if ($validator->fails()) {
              return redirect()->route('author.post-getAdd')
                  ->withErrors($validator)
                  ->withInput();
          }

          $post_list= new PostList;
          $post_list->title = $request->title;
          $post_list->post_category_id = $request->post_category_id;
          $post_list->user_id = $request->user()->id;
          $post_list->image_avatar = $request->image_avatar;
          $post_list->quotes_content = $request->quotes_content;
          $post_list->content = $request->_content;
          $post_list->status = '0';
          $post_list->view = '0';
          $post_list->save();

          $post_draft_lates_id=PostList::select('id')->where('status','0')->orderBy('created_at','desc')->first();
          if(isset($post_draft_lates_id)){
              return redirect()->route('author.post-show',['id'=>$post_draft_lates_id]);
          }
      }

      return redirect()->back();

    }

    public function getEdit(Request $request)
    {
        $request_id = $request->id;
        if(isset($request_id)){
            $Post=PostList::with('getPostCategoryTable')->where('id',$request_id)->first();
            if($Post->count() > 0){
                $post_category=Post_category::select('id','post_cat_name')->get();
                return view('author.post.post-edit',[
                    'Post'=>$Post,
                    'post_category'=>$post_category,
                ]);
            }
        }
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $request_id = $request->id;
        if(isset($request_id)){
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:1000',
                'post_category_id' => 'required',
                'image_avatar' => 'required',
                'quotes_content' => 'required|max:1000',
                '_content' => 'required|max:10000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $Post= PostList::find($request_id);
            if($Post ->count() > 0){
                $Post->title = $request->title;
                $Post->post_category_id = $request->post_category_id;
                $Post->user_id = Auth::id();
                $Post->image_avatar = $request->image_avatar;
                $Post->quotes_content = $request->quotes_content;
                $Post->content = $request->_content;
                $Post->status = '0';
                $Post->view = '0';
                $Post->save();

                return redirect()->route('author.post-show',['id'=>$request_id]);
            }
        }

        return redirect()->back();
    }

    public function sendStatus($id)
    {
        if(isset($id)){
            $Post = new PostList;
            $post_query = $Post->where([['status','0'],['id',$id]]);
            if($post_query->get()->count() > 0){
                $post_query->update(['status' => '1']);
                return redirect()->route('author.post-getList');
            }
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        if(isset($id)){
            $Post = new PostList;
            $post_query = $Post->where([['status','0'],['id',$id]]);
            //
            if($post_query->get()->count() > 0){
                $post_query->delete();
                return redirect()->route('author.post-getList');
            }
        }

        return redirect()->back();
    }

}
