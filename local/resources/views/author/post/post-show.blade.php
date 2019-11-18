@extends('author.app')
@section('content')
    @if(isset($post_content))
        <div class="backend-post-content">
                <div class="container">
                    <div class="content">
                            <p class="title"><h3>{{$post_content->title}}</h3></p>
                            <p class="quotes"><strong>{!!$post_content->quotes_content!!}</strong></p>
                            <p>{!! $post_content->content !!}</p>
                            <p class="backend-author">Create by: {{$post_content->getAuthorByUsersTable->name}}</p>
                    </div>
                </div>
                <div class="backend-btn-act">
                    @if($post_content->status > 0)
                        <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('author.post-getList')}}">Back</a>
                    @endif
                    @if($post_content->status == 0)
                        <a role='button' class='btn btn-sm btn-outline-danger'
                           href="{{route('author.post.delete',['id'=>$post_content->id])}}">
                            Hủy Bài Nháp
                        </a>
                        <a role='button' class='btn btn-sm btn-outline-danger'
                           href="{{route('author.post-getEdit',['id'=>$post_content->id])}}">
                            Sữa Bài Viết
                        </a>
                        <a role='button' class='btn btn-sm btn-outline-danger' href="{{route('author.post-getList')}}">
                            Lưu Nháp
                        </a>
                        <a role='button' class='btn btn-sm btn-outline-danger' href="{{route('author.post.send-status',['id'=>$post_content->id])}}">
                            Gửi Bài Viết
                        </a>
                    @endif
                </div>
        </div>
        @endif
@endsection