<div class="block block-side-bar" >
    <div class="block-header">
        <h4>Du Lịch Đà Nẵng</h4>
    </div>
    @if(isset($du_lich))
    @foreach($du_lich as $item)
        <div class="content">
            <div class="card" >
                <img class="card-img-top" src="{{$item->image_avatar}}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$item->title}}</h3>
                    <a href="{{getPostLinkById($Posts,$item->id)}}" class="btn btn-primary">view all</a>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>
