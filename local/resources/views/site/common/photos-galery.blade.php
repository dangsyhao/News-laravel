<div class="block block-post-category block-image-crosel" >
    <div class="block-header">
        <h4 class="title">Du Lịch Đà Nẵng</h4>
    </div>
    <div class="content get-slick-bottom-block">
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
