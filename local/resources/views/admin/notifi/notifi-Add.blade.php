@extends('admin.app')
@section('content')
<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.notifi-add') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content" class="col-md-4 control-label">Content</label>
                                    <div class="col-md-6">
                                        <textarea id="content" type="text" class="form-control" name="content" value="{{ old('content') }}" required autofocus></textarea>
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
                                        <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.notifi-getNotifi')}}">Cancel</a>
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


@endsection 