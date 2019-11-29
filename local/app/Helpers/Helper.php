<?php

if(! function_exists('getPostLinkById')){

    function getPostLinkById($Posts,$id){

        $link = 'link not set';

        if($Posts->count() > 0 ){
            $post = $Posts->find($id);
            if($post->count() > 0){
                $post_cat_slug = str_slug($post->getPostCategoryTable->post_cat_name);
                $post_name_slug = str_slug($post->title);
                $post_id = $post->id;
                $link = url('/'.$post_cat_slug.'/'.$post_name_slug.'?post_id='.$post_id.'&post_type=post');
            }
        }else{
            var_dump('Posts does not exits !');
        }
        return $link;
    }

    //
    function getPostById($post_id,$Posts=''){
        $return =collect();
        if(isset($post_id)){
            if(empty($Posts)){
                $Post_obj = new \App\PostList;
                $post_query = $Post_obj->find($post_id);
            }else{
                $post_query = is_array($Posts) ? collect($Posts)->find($post_id) : $Posts->find($post_id);
            }

            if(!empty($post_query) && $post_query->count()>0){
                $return = $post_query;
            }
        }
        return $return;
    }
    //
    function getPostCatById($post_cat_id,$Post_cats = ''){

        $return =collect();

        if(isset($post_cat_id)){
            if(empty($Post_cats)){
                $Post_cat_obj = new \App\Post_Category;
                $post_cat_query = $Post_cat_obj->find($post_cat_id);
            }else{
                $post_cat_query = is_array($Post_cats) ? collect($Post_cats)->find($post_cat_id) : $Post_cats->find($post_cat_id);
            }

            if(!empty($post_cat_query) && $post_cat_query->count()>0){
                $return = $post_cat_query;
            }
        }
        return $return;
    }

}