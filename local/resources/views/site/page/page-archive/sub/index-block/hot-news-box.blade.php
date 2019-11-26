<div class="block block-lates-box">
    <div class="content">
        <ul class="list-group">
            @if(! empty($post_data['posts_cat_latest']))
                @foreach($post_data['posts_cat_latest'] as $row)
                    <li class="list-group-item">
                        <a href="{{getPostLinkById($Posts,$row->id)}}">{{$row->title}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>