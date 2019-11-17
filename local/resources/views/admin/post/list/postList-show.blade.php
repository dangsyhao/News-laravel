@extends('admin.app')
@section('content')
        <div class="card-body">
        <!-- Data Contents-->
        @if(isset($post_content))
            @foreach($post_content as $row)
                {!! $row->content !!}
        <!-- Data Contents-->
            <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class='form-group'>
                            <a role="button" class="btn btn-sm btn-outline-danger mr-1" href="{{route('admin.postList-del',['id'=>$row->id])}}">Xóa Bài Viết</a>
                        @if($row->status=='1')
                            <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.postList-accept',['id'=>$row->id])}}">Duyệt Bài Viết</a>
                        @endif
                        @if($row->status=='2')
                            <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.postList-accept_index',['id'=>$row->id])}}">Đăng Trang Nhất</a>
                        @endif
                            <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('admin.post.getPost')}}">Back</a>

                        </div>
                    </div>
                </div>
        @endforeach
        @endif
    </div>

@endsection