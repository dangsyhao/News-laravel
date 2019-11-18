@extends('author.app')
@section('content')
        <div class="jumbotron">
        @if(isset($notifi_list))
            @foreach($notifi_list as $row)
                <h1 class="display-4">Thông Báo!</h1>
                <p class="lead">{{$row->title}}</p>
                    <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-outline-primary btn-lg" href="{{route('author.dashboard.noteContent',['id'=>$row->id])}}" role="button">Xem Thông báo</a>
                </p>
                <p class="small text-muted">Ngày ra thông báo : {{$row->updated_at}}</p>
            @endforeach
        @endif
            <div class="col-sm-12 col-md-12 offset-md-8 ">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <ul class="pagination">
                    {{$notifi_list->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="area-chart">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Area Chart Example-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-area-chart"></i>
                            Lượt Truy Cập Trang News Website !
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted"><!--Updated yesterday at 11:59 PM!--></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->

@endsection 