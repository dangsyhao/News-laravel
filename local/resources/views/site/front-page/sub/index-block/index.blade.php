<div class="block block-post-index" >
    <div class="block-header">
        <h3>Trang Nhất</h3>
    </div>
    <div class="content">
        @if( ! empty($post_data['post_index']))
            @foreach($post_data['post_index'] as $row)
                <div class="card">
                    <img src="{{$row->image_avatar}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">{{$row->title}}</h3>
                        <p class="card-text">{{$row->quotes_content}}</p>
                        <a href="{{getPostLinkById($Posts,$row->id)}}">view all</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
