@extends('layout-master.dashboard.app')
@section('content')
    @if(isset($post_content))
        <div class="backend-post-content">
            <div class="container">
                <div class="content">
                    <p class="title"><h3>{{$post_content->title}}</h3></p>
                    <p class="quotes"><strong>{!!$post_content->quotes_content!!}</strong></p>
                    <p>{!! $post_content->content !!}</p>
                    <p class="backend-author">
                        Create by:@if(isset($post_content->getAuthorByUsersTable->name))
                                    {{$post_content->getAuthorByUsersTable->name}}
                                    @endif
                    </p>
                </div>
            </div>
            <div class="backend-btn-act">
                <div class="row">
                    @if($post_content->status < 3)
                    <a role="button" class="btn btn-sm btn-outline-danger mr-1" href="{{route('admin.postList-del',['id'=>$post_content->id])}}">Xóa Bài Viết</a>
                    @endif
                    @if($post_content->status=='1')
                        <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.postList-accept',['id'=>$post_content->id])}}">Duyệt Bài Viết</a>
                    @endif
                    @if($post_content->status=='2')
                        <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.postList-accept_index',['id'=>$post_content->id])}}">Đăng Trang Nhất</a>
                    @endif
                    <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.post.getPost')}}">Back</a>
                </div>
            </div>
        </div>
    @endif
@endsection


