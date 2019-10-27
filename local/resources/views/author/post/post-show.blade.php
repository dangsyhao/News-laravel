@extends('author.layouts.app')
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
     

            @endforeach
            

        @endif


        <!-- Data Contents-->

        </div>
    </div>
</div>
          

@endsection