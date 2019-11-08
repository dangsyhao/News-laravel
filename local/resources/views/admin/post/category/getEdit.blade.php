@extends('admin.app')
@section('content')
<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.getPostCategoryTable-edit') }}">
                                {{ csrf_field() }}
                        @if(isset($getPostCategoryTable_edit))
                            @foreach($getPostCategoryTable_edit as $row)
                                <input  type="hidden" name="id" value="{{$row->id}}">
                                <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                    <label for="value" class="col-md-4 control-label">Value</label>
                                    <div class="col-md-6">
                                        <input id="value" type="text" class="form-control" name="value" value="{{$row->value}}">
                                        @if ($errors->has('value'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('value') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="desciption" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea id="description" type="text" class="form-control" name="description" value="">{{$row->description}}</textarea>
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
                                        <a role="button" class="btn btn-primary " href="{{route('admin.getPostCategoryTable-post')}}">Cancel</a>
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