<div class="block block-image-crosel block-side-bar" id="bock-side-bar-ban-doc">
    <div class="block-header">
        <h4 class="title">Bạn Đọc</h4>
    </div>
    <div class="content get-slick-ban_doc-block">
        @if(!empty($post_data['chinh_tri']))
            @foreach($post_data['chinh_tri'] as $key => $item)
                <div class="image-item">
                    <a href="{{getPostLinkById($Posts,$item->id)}}">
                        <img  src="{{$item->image_avatar}}" alt="{{$item->title}}" title="{{$item->title}}">
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
