<div class="block block-post-category" >
    <h3 class="title">Y Tế</h3>
    <div class="content">
        <ul>
            @if(!empty($post_data['y_te']))
                @foreach($post_data['y_te'] as $key => $item)
                    @if($key == 0)
                        <li class="post-latest">
                            <div class="card" >
                                <img class="card-img-top" src="{{$item->image_avatar}}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{$item->title}}</h3>
                                    <p class="card-text">{{$item->quotes_content}}</p>
                                    <a href="{{getPostLinkById($Posts,$item->id)}}" class="btn btn-primary">view all</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="post-none-latest">
                            <a href="{{getPostLinkById($Posts,$item->id)}}" class="title">{{$item->title}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>