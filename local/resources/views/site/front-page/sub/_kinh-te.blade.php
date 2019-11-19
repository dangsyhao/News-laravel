<div class="world-news" id='kinhte'>
    <div class="main-title-head">
        <h3>Kinh Tế</h3>
        <div class="clearfix"></div>
    </div>
    @foreach($kinh_te_index as $row)
        <div class="world-news-grids">
            <div class="world-news-grid">
                <img src="{{$row->image_avatar}}" alt="" />
                <a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
                    {{$row->title}}</a>
                <p>{{$row->quotes_content}}</p>

            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
    <hr>
    <ul>
        @foreach($kinh_te_link as $row)
            <li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
                    {{$row->title}} </a></li>
        @endforeach
    </ul>
    <div class="clearfix"></div>
</div>