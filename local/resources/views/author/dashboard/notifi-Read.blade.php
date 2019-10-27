@extends('author.layouts.app')
@section('content')
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Show Notificate</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header"><i class="fa fa-table"></i> Xem Thông Báo</div>
                <div class="card-body">
                    <div class="container">

                            <div class="jumbotron">
                        @if(isset($notifi_list))    
                            @foreach($notifi_list as $row)
                                <h1 class="display-4">Thông Báo!</h1>
                                <p class="lead">{{$row->title}}</p>
                                    <hr class="my-4">
                                <p>{{$row->content}}</p>
                                <p class="lead">
                                
                                </p>
                            @endforeach
                        @endif
                            </div>
                    </div>
                </div>
             <div class="card-footer small text-muted">Ngày ra thông báo : {{$row->updated_at}}</div>
            
            </div>
    </div>



@endsection 