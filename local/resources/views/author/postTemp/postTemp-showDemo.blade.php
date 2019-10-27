@extends('author.layouts.app')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Review Post Temporaty</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Xem Bài Nháp</div>
        <div class="card-body">

        <!-- Data Contents-->
        @if(isset($review_content))

            @foreach($review_content as $row)

                {!! $row->content !!}

        <!-- Data Contents-->

        </div>
        
              <div class="row">

                    <div class="col-sm-12 col-md-7">
                        <div class='form-group'>
                            <a role='button'  class='btn btn-md btn-danger' href="{{route('author.postTemp-update',['id'=>$row->id])}}" >Gửi Bài Viết</a>
                            <a role='button'  class='btn btn-md btn-danger' href="{{route('author.postTemp-getEdit',['id'=>$row->id])}}" >Sữa Bài</a>
                            <a role='button'  class='btn btn-md btn-danger' href="{{route('author.post-getList')}}" >Lưu Nháp</a>
                            <a role='button'  class='btn btn-md btn-danger' href="{{route('author.postTemp-del',['id'=>$row->id])}}" >Xóa Bài Nháp</a>
                         </div>
                    </div>

                </div>

        @endforeach
    @endif

    </div>
</div>
          

@endsection