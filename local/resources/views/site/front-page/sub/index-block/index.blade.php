<div class="page-index" id='trang_nhat'>
    <div class="main-title-head">
        <h3>Trang Nhất</h3>
        <div class="clearfix"></div>
    </div>
    <div class="page-index-grids">
        @foreach($page_index as $row)
            <div class="page-index-grid">
                <a href="{{route('site.singlePage',[
                                                    'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
                                                    'post_name'=>str_slug($row->title),
                                                    'post_id'=>$row->id
                                                    ])}}" class="title">
                    <img src="{{$row->image_avatar}}" alt="" />
                    <p>{{$row->title}}</p>
                </a>
                <p>{{$row->quotes_content}}</p>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
</div>