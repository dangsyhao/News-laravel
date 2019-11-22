<div class="hot-news">
    <div class="hot-news-news">
    @if(empty($post_data['hot_new_list']))
        @foreach($post_data['hot_new_list'] as $row)
            <div class="hot-news-grid">
                <p>
                    <a href="{{getPostLinkById($Posts,$row->id)}}" class="title">
                        {{$row->title}}
                    </a>
                </p>
            </div>
        @endforeach
    @endif
    </div>
</div>