<div class="block block-post-category block-right" >
    <div class="block-header">
        <h4 class="title">Pháp Luật</h4>
    </div>
    <div class="content">
        @if(!empty($post_data['phap_luat']))
            @foreach($post_data['phap_luat'] as $key => $item)
                @if($key == 0)
                <div class="articles-latest">
                    <div class="post-title">
                        <h5>{{$item->title}}</h5>
                    </div>
                    <div class="body">
                        <img src="{{$item->image_avatar}}" alt="{{$item->title}}">
                        <div class="content-right">
                            <a href="{{getPostLinkById($Posts,$item->id)}}" >
                                <span class="text">{{str_limit($item->quotes_content,100)}}</span>
                                <br>
                                <span class="read_more">xem thêm >>></span>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <span class="articles-latest-item">
                    <a href="{{getPostLinkById($Posts,$item->id)}}" class="title"><span class="dot"></span>>> {{$item->title}}</a>
                </span>
                @endif
            @endforeach
        @endif
    </div>
</div>
