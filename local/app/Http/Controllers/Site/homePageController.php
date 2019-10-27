<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;

class homePageController extends Controller
{

    /** Index Page*/ 
    public function index()
    {
        //PostList
        $post_list=PostList::select('id',
                                    'title',
                                    'image_avatar',
                                    'quotes_content',
                                    'updated_at',
                                    'post_category_id',
                                    'view',
                                    'status'
                                    )
                                    ->where('status','>','1')
                                    ->get();


        $collection=collect($post_list);

        //Trang Nhat
        $page_index= $collection->where('status','=','3');
        $page_index->all();

        //Tin moi nhat
         $hot_news= $collection->sortByDesc('updated_at')->take('10');
         $hot_news->all();
        
        //Chinh tri-xa hoi
        $chinh_tri_link= $collection->where('post_category_id','=','4')->take(-3)->slice(0,2);
        $chinh_tri_link->all();
        $chinh_tri_index= $collection->where('post_category_id','=','4')->take(-3)->slice(2);
        $chinh_tri_index->all();

         //Kinh tế
         $kinh_te_link= $collection->where('post_category_id','=','5')->take(-3)->slice(0,2);
         $kinh_te_link->all();
         $kinh_te_index= $collection->where('post_category_id','=','5')->take(-3)->slice(2);
         $kinh_te_index->all();

          //Giao Duc
        $giao_duc_link= $collection->where('post_category_id','=','6')->take(-3)->slice(0,2);
        $giao_duc_link->all();
        $giao_duc_index= $collection->where('post_category_id','=','6')->take(-3)->slice(2);
        $giao_duc_index->all();

         //Quoc Te
         $quoc_te_link= $collection->where('post_category_id','=','7')->take(-3)->slice(0,2);
         $quoc_te_link->all();
         $quoc_te_index= $collection->where('post_category_id','=','7')->take(-3)->slice(2);
         $quoc_te_index->all();

          //Van Hoa
        $van_hoa_link= $collection->where('post_category_id','=','8')->take(-3)->slice(0,2);
        $van_hoa_link->all();
        $van_hoa_index= $collection->where('post_category_id','=','8')->take(-3)->slice(2);
        $van_hoa_index->all();

         //Y Te
         $y_te_link= $collection->where('post_category_id','=','9')->take(-3)->slice(0,2);
         $y_te_link->all();
         $y_te_index= $collection->where('post_category_id','=','9')->take(-3)->slice(2);
         $y_te_index->all();

          //Phap Luat
        $phap_luat_link= $collection->where('post_category_id','=','10')->take(-3)->slice(0,2);
        $phap_luat_link->all();
        $phap_luat_index= $collection->where('post_category_id','=','10')->take(-3)->slice(2);
        $phap_luat_index->all();

         //Ban Doc
         $ban_doc_link= $collection->where('post_category_id','=','11')->take(-3)->slice(0,2);
         $ban_doc_link->all();
         $ban_doc_index= $collection->where('post_category_id','=','11')->take(-3)->slice(2);
         $ban_doc_index->all();

          //The Thao
        $the_thao_link= $collection->where('post_category_id','=','12')->take(-3)->slice(0,2);
        $the_thao_link->all();
        $the_thao_index= $collection->where('post_category_id','=','12')->take(-3)->slice(2);
        $the_thao_index->all();

        // Return View
        return view('site.index',[
                                    'chinh_tri_link'=>$chinh_tri_link,'chinh_tri_index'=>$chinh_tri_index,
                                    'kinh_te_link'=>$kinh_te_link,'kinh_te_index'=>$kinh_te_index,
                                    'giao_duc_link'=>$giao_duc_link,'giao_duc_index'=>$giao_duc_index,
                                    'quoc_te_link'=>$quoc_te_link,'quoc_te_index'=>$quoc_te_index,
                                    'van_hoa_link'=>$van_hoa_link,'van_hoa_index'=>$van_hoa_index,
                                    'y_te_link'=>$y_te_link,'y_te_index'=>$y_te_index,
                                    'phap_luat_link'=>$phap_luat_link,'phap_luat_index'=>$phap_luat_index,
                                    'ban_doc_link'=>$ban_doc_link,'ban_doc_index'=>$ban_doc_index,
                                    'the_thao_link'=>$the_thao_link,'the_thao_index'=>$the_thao_index,
                                    'page_index'=>$page_index,
                                    'hot_news'=>$hot_news,

                                ]);



  }

  

}
