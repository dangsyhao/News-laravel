<div class="block block-post-category" >
    <div class="block-header">
        <h3 class="title">Chính Trị</h3>
    </div>
    <div class="content">
            @if(!empty($post_data['chinh_tri']))
                @foreach($post_data['chinh_tri'] as $key => $item)
                    @if($key == 0)
                        <div class="articles-latest">
                            <div class="card" >
                                <img class="card-img-top" src="{{$item->image_avatar}}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{$item->title}}</h3>
                                    <p class="card-text">{{$item->quotes_content}}</p>
                                    <a href="{{getPostLinkById($Posts,$item->id)}}" >read more</a>
                                </div>
                            </div>
                        </div>
                    @else
                    <span class="articles-latest-item">
                        <a href="{{getPostLinkById($Posts,$item->id)}}" class="title">{{$item->title}}</a>
                    </span>
                    @endif
                @endforeach
            @endif
    </div>
</div>
