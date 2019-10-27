@extends('admin.layouts.app')
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
                        @if(isset($image_url))
                            @foreach($image_url as $row)
                        <img src=" {{$row->image_url}}" class="rounded" alt="Cinque Terre" style="min-height: 125px; min-width: 225px;" >
                            @endforeach
                        @endif
                        </div>
                    </div>
    
            </div>
    </div>



@endsection 