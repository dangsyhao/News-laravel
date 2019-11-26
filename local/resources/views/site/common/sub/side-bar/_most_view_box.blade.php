<div class="block block-side-bar block-most-view-box" id="block-most-view-box">
    <div class="block-header">
        <h4>Xem Nhiều Nhất</h4>
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