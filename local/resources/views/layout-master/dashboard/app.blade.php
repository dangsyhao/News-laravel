@include('layout-master.dashboard.header')
<!-- Navigation-->
@if($Auth_role == 'admin')
    @include('layout-master.dashboard.admin-navigation')
@else
    @include('layout-master.dashboard.author-navigation')
@endif
<!-- Content-->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Advertise</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
                Quảng Cáo
            </div>
            <div class="card-body">
                <!--content-->
            @yield('content')
            <!-- /.content-->
            </div>
        </div>
    </div>
    @if(isset($request->updated_at))
    <div class="card-footer small text-muted">{{$request->updated_at}}</div>
    @endif
</div>
@include('layout-master.dashboard.footer')
<!-- /.Footer-->

