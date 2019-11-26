<div class="block block-post-index" >
    <div class="block-header">
        <h4 class="title">Category Name</h4>
    </div>
    <div class="content">
        @if( ! empty($post_data['posts_cat_index']))
            @foreach($post_data['posts_cat_index'] as $row)
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
