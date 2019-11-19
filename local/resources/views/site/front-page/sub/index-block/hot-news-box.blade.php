<div class="hot-news">
    <div class="hot-news-news">
        @foreach($hot_news as $row)
            <div class="hot-news-grid">
                <p>
                    <a href="{{route('site.singlePage',[
                                                        'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
                                                        'post_name'=>str_slug($row->title),
                                                        'post_id'=>$row->id
                                                        ])}}" class="title">
                        {{$row->title}}
                    </a>
                </p>
            </div>
        @endforeach
    </div>
</div>