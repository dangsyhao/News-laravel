<div class="block block-image-crosel block-side-bar" id="block-side-bar-ban-doc">
    <div class="block-header">
        <h4 class="title">Bạn Đọc</h4>
    </div>
    <div class="content get-slick-ban_doc-block">
        @if(!empty($post_data_sidebar['ban_doc']))
            @foreach($post_data_sidebar['ban_doc'] as $key => $item)
                <div class="image-item">
                    <img  src="{{$item->image_avatar}}" class="image-carosel" alt="not image availble">
                    <div class="middle">
                        <div class="text">
                            <a href="{{getPostLinkById($Posts,$item->id)}}">{{$item->title}}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif
    </div>
</div>
