<div class="section section-posts-block">
    <div class="block block-posts-category" >
        @if(!empty($post_data['posts_cat_latest']))
            @foreach($post_data['posts_cat_latest'] as $key => $item)
                <div class="articles-items">
                    <img class="img-left" src="{{$item->image_avatar}}" alt="{{$item->title}}">
                    <div class="content">
                        <a href="{{getPostLinkById($Posts,$item->id)}}" >
                            <h4 class="title">{{$item->title}}</h4>
                            <p class="text">{{str_limit($item->quotes_content,250)}}
                                <span class="read_more"> xem thêm >>></span>
                            </p>

                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach
        @endif
    </div>
</div>

