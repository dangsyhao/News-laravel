<div class="block block-post-index" >
    <div class="block-header">
        <h3 class="title">Trang Nhất</h3>
    </div>
    <div class="content">
        @if( ! empty($post_data['post_index']))
            @foreach($post_data['post_index'] as $row)
            <img src="{{$row->image_avatar}}" class="img-top" alt="{{$row->title}}">
            <div class="body">
                <a href="{{getPostLinkById($Posts,$row->id)}}">
                    <h3 class="title">{{$row->title}}</h3>
                    <p class="text">{{str_limit($row->quotes_content,200)}}<span class="read_more"> ... xem thêm >>></span></p>
                </a>
            </div>
            @endforeach
        @endif
    </div>
</div>
