<div class="col-md-3 side-bar">
    @if(isset($du_lich))
        <div class="world-news" id='chinh_tri'>
            <div class="main-title-head">
                <h3>Du Lịch Đà Nẵng</h3>
                <div class="clearfix"></div>
            </div>
            @foreach($du_lich as $row)
                <div class="world-news-grids-du_lich">
                    <div class="world-news-grid">
                        <img src="{{$row->image_avatar}}" alt="" />
                        <a  href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->getMenuCategoryTable->post_cat_name),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
                            {{$row->title}}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="popular">
        <div class="main-title-head">
            <h3>Xem Nhiều Nhất</h3>
            <div class="clearfix"></div>
        </div>
        <div class="popular-news">
            @foreach($most_view as $row)
                <div class="popular-grid">
                    <i>{{$row->updated_at}}</i>
                    <p>
                        <a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}">
                            {{$row->title}}
                        </a>
                    </p>
                </div>
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
    @if(isset($advertise))
        <div class="world-news" id='chinh_tri'>
            @foreach($advertise as $row)
                <div class="world-news-grids-du_lich">
                    <div class="world-news-grid">
                        <a  href="{{$row->link}}" class="title">
                            <img src="{{$row->image_url}}" alt="" />
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<div class="clearfix"></div>
</div>