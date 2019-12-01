<ul class="comment-list">
    <h5 class="post-author_head"><strong>Theo</strong>: {{$row->getAuthorByUsersTable->name}}</h5>
</ul>
<div class="content-form">
    <div class="fb-comments" data-href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->getPostCategoryTable->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" data-numposts="5">
    </div>
</div>