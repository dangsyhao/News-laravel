<div class="block block-most-view-box">
    <div class="block-header">
        <h3>Xem Nhiều Nhất</h3>
    </div>
    <div class="content">
            <ul class="list-group">
                @if(! empty($most_view))
                    @foreach($most_view as $row)
                        <li class="list-group-item">
                            <a href="{{getPostLinkById($Posts,$row->id)}}">{{$row->title}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
    </div>
</div>