@extends('admin.layouts.app')
@section('content')
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Notificate</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header"><i class="fa fa-table"></i> Thêm Thông Báo</div>
                <div class="card-body">
                    <div class="container">

                            <div class="jumbotron">
                                    @if(isset($notifi_list))    
                                        @foreach($notifi_list as $row)
                                            <h1 class="display-4">Thông Báo!</h1>
                                            <p class="lead">{{$row->title}}</p>
                                                <hr class="my-4">
                                            
                                            <p class="lead">
                                                <a class="btn btn-outline-primary btn-lg" href="{{route('admin.notifi-read',['id'=>$row->id])}}" role="button">Xem Thông báo</a>
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

                        <div class="row">
                            <div class="col-lg-12">
                              <!-- Area Chart Example-->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fa fa-area-chart"></i> Area Chart Example
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>    
                            <!-- /.container-fluid-->

                    </div>
                </div>
             <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            
            </div>
    </div>

   
   
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{asset('public/admin/js/sb-admin-charts.min.js')}}"></script>


@endsection 