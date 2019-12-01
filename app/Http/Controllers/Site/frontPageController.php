<?php

namespace App\Http\Controllers\site;

use App\Menu_category;
use App\Post_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;

class frontPageController extends Controller
{

    public function frontPage()
    {
        //PostList
        $Posts_obj = new PostList;
        $Post_cat = new Post_Category;
        $Post_cat_slug = $Post_cat->select('id','post_cat_slug')->get();
        $post_data = collect();

        //Trang Nhat
        $post_index= $Posts_obj->where('status','=','3')->get();
        $post_index = $post_index->count() > 0 ? $post_index : '';
        $post_data = $post_data->put('post_index',$post_index);

        //Tin moi nhat
        $hot_new_list= $Posts_obj->where([['status','>','1'],['status','<','3']])->orderBy('updated_at','desc')->get()->take('7');
        $hot_new_list = $hot_new_list->count() > 0 ? $hot_new_list : '';
        $post_data = $post_data->put('hot_news_list',$hot_new_list);

        //Chinh tri-xa hoi
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
                            return $value->post_cat_slug === 'chinh-tri-xa-hoi';
                        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $chinh_tri= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $chinh_tri = $chinh_tri->count() > 0 ? $chinh_tri : '';
        $post_data = $post_data->put('chinh_tri',$chinh_tri);

        //Kinh tế
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'kinh-te';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $kinh_te= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $kinh_te = $kinh_te->count() > 0 ? $kinh_te : '';
        $post_data = $post_data->put('kinh_te',$kinh_te);

        //Giao Duc
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'giao-duc';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $giao_duc= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $giao_duc = $giao_duc->count() > 0 ? $giao_duc : '';
        $post_data = $post_data->put('giao_duc',$giao_duc);

        //Quoc Te
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'quoc-te';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $quoc_te= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $quoc_te = $quoc_te->count() > 0 ? $quoc_te : '';
        $post_data = $post_data->put('quoc_te',$quoc_te);

        //Van Hoa
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'van-hoa-giai-tri';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $van_hoa= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $van_hoa = $van_hoa->count() > 0 ? $van_hoa : '';
        $post_data = $post_data->put('van_hoa',$van_hoa);

        //Y Te
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'y-te-suc-khoe';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $y_te= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $y_te = $y_te->count() > 0 ? $y_te : '';
        $post_data = $post_data->put('y_te',$y_te);

        //Phap Luat

        $post_cat_id_pl = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug == 'phap-luat';
        });
        $post_cat_id_pl = ! empty($post_cat_id_pl->pluck('id')->toArray()[0]) ? $post_cat_id_pl->pluck('id')->toArray()[0] : '';
        $phap_luat= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id_pl],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $phap_luat = $phap_luat->count() > 0 ? $phap_luat : '';
        $post_data = $post_data->put('phap_luat',$phap_luat);


        //Ban Doc
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'ban-doc';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $ban_doc= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $ban_doc = $ban_doc->count() > 0 ? $ban_doc : '';
        $post_data = $post_data->put('ban_doc',$ban_doc);

        //The Thao
        $post_cat_id = $Post_cat_slug->filter(function ($value,$key){
            return $value->post_cat_slug === 'the-thao';
        });
        $post_cat_id = ! empty($post_cat_id->pluck('id')->toArray()[0]) ? $post_cat_id->pluck('id')->toArray()[0] : '';
        $the_thao= $Posts_obj->where([['status','>','1'],['post_category_id',$post_cat_id],['status','<','3']])->orderBy('updated_at','desc')->get()->take(3);
        $the_thao = $the_thao->count() > 0 ? $the_thao : '';
        $post_data = $post_data->put('the_thao',$the_thao);

        // Return View
        return view('site.front-page',['post_data'=>$post_data]);
  }

}
