@extends('admin.app')
@section('content')
<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.menu.category.edit') }}">
                            {{ csrf_field() }}
                            @if(isset($Cate_menu))
                            @foreach($Cate_menu as $row)
                                <input  type="hidden" name="id" value="{{$row->id}}">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$row->name}}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" value="{{$row->description}}">

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
                                        <a role="button" class="btn btn-primary " href="{{route('admin.menu.category.index')}}">Cancel</a>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 