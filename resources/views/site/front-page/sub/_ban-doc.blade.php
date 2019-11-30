<div class="block block-post-category" >
    <div class="block-header">
        <h4 class="title">Bạn Đọc</h4>
    </div>
    <div class="content">
        @if(!empty($post_data['ban_doc']))
            @foreach($post_data['ban_doc'] as $key => $item)
                @if($key == 0)
                    <div class="articles-latest">
                        <img class="img-top" src="{{$item->image_avatar}}" alt="{{$item->title}}">
                        <div class="body">
                            <a href="{{getPostLinkById($Posts,$item->id)}}" >
                                <h4 class="title">{{$item->title}}</h4>
                                <p class="text">{{str_limit($item->quotes_content,133)}}
                                    <span class="read_more"> xem thêm >>></span>
                                </p>
                            </a>
                        </div>
                    </div>
                @else
                    <span class="articles-latest-item">
                            <span class="dot"></span>
                            <a href="{{getPostLinkById($Posts,$item->id)}}" class="title"> >> {{$item->title}}</a>
                        </span>
                @endif
            @endforeach
        @endif
    </div>
</div>
