@extends('site.app')
@section('content')
<article id="the-post">
    @if(isset($post_data))
    <div class="post-info">
        <hearder>
            <h2 class="entry-title">
                {{$post_data->title}}
            </h2>
            <ul class="info">
                <li class="date-timer">
                    <span class="author">{{$post_data->getAuthorByUsersTable->name}}</span>
                    <time class="tie-date">• {{$post_data->updated_at}}</time>
                    <span class="post-views"> • {{$post_data->view}} lượt xem</span>
                    <div class="clear"></div>
                </li>
            </ul>
        </hearder>
    </div>
    <div class="entry-content">
        {!! $post_data->content !!}
    </div>
    <footer>
        <div class="author">
            <h5 class="post-author-foot">
                <strong>Theo</strong>: {{$post_data->getAuthorByUsersTable->name}}
            </h5>
        </div>
        <div class="clearfix"></div>
        <div class="fb-comments" data-href="{{getPostLinkById($Posts,$post_data->id)}}" data-numposts="5"></div>
    </footer>
    @endif
</article>
@endsection