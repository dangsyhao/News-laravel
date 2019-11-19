<div class="grid box">
    <div class="grid-header">
        <ul class="category-list">
            <h5 class="post-category_head">{{$row->getPostCategoryTable->value}}</h5>
        </ul>
        <a class="gotosingle" href="#">{{$row->title}}</a>
        <ul>
            <li><span>{{$row->updated_at}}</span></li>
        </ul>
    </div>
    <div class="singlepage">
        <p><strong>{!!$row->quotes_content!!}</strong></p>
        <p>{!!$row->content!!}</p>
        <div class="clearfix"></div>
    </div>
</div>