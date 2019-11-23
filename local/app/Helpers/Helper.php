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
                $link = url('/'.$post_cat_slug.'/'.$post_name_slug.'/post_id='.$post_id);
            }
        }else{
            var_dump('Posts does not exits !');
        }
        return $link;
    }
}