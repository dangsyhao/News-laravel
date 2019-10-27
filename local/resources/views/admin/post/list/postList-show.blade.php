@extends('admin.layouts.app')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Post</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Xem Bài Đăng</div>
        <div class="card-body">

        <!-- Data Contents-->
        @if(isset($post_content))

            @foreach($post_content as $row)

          
                {!! $row->content !!}
    

        <!-- Data Contents-->

        </div>
            <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class='form-group'>
                            <a role="button" class="btn btn-md btn-danger mr-1" href="{{route('admin.postList-del',['id'=>$row->id])}}">Xóa Bài Viết</a>
                        @if($row->status=='1')
                            <a role="button" class="btn btn-md btn-danger" href="{{route('admin.postList-accept',['id'=>$row->id])}}">Duyệt Bài Viết</a>
                        @endif
                        @if($row->status=='2')
                            <a role="button" class="btn btn-md btn-danger" href="{{route('admin.postList-accept_index',['id'=>$row->id])}}">Đăng Trang Nhất</a>
                        @endif
                        </div>
                    </div>
                </div>
        @endforeach
        @endif

       
    </div>
</div>
          

@endsection