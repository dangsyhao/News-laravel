<div class="world-news" id='chinh_tri'>
    <div class="main-title-head">
        <h3>Chính Trị - Xã Hội</h3>
        <div class="clearfix"></div>
    </div>
    @foreach($chinh_tri_index as $row)
        <div class="world-news-grids">
            <div class="world-news-grid">
                <img src="{{$row->image_avatar}}" alt="" />
                <a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">{{$row->title}}</a>
                <p>{{$row->quotes_content}}</p>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
    <hr>
    <ul>
        @foreach($chinh_tri_link as $row)
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