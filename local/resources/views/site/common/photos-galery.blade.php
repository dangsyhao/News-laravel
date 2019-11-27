<div class="block block-post-category block-image-crosel" id="block-du-lich-dn">
    <div class="block-header">
        <h4 class="title">Du Lịch Đà Nẵng</h4>
    </div>
    <div class="content get-slick-bottom-block">
        @if(!empty($post_data_sidebar['du_lich']))
            @foreach($post_data_sidebar['du_lich'] as $key => $item)
            <div class="image-item">
                <a href="{{getPostLinkById($Posts,$item->id)}}">
                    <img  src="{{$item->image_avatar}}" class="image-carosel" alt="not image availble">
                    <div class="middle">
                        <div class="text">{{$item->title}}</div>
                    </div>
                </a>
            </div>
            @endforeach
        @endif
    </div>
</div>
