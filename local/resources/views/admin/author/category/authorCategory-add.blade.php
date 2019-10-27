@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Add - Date</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Add Date Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.authorCategory-add') }}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                            <label for="value" class="col-md-4 control-label">Value</label>

                            <div class="col-md-6">
                                <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" required autofocus>

                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                               
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                <a role="button" class="btn btn-primary " href="{{route('admin.authorCategory-author')}}">Cancel</a>
                            </div>
                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

            </div>
        </div>
     </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


@endsection 