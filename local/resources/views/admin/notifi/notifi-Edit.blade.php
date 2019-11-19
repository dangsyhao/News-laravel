@extends('layout-master.dashboard.app')
@section('content')
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.notifi-edit') }}">
                                    {{ csrf_field() }}
                                @if(isset($notifi_edit))
                                    @foreach($notifi_edit as $row)
                                        <input  type="hidden" name="id" value="{{$row->id}}">
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title" class="col-md-4 control-label">Title</label>
                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control" name="title" value="{{$row->title}}">
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label for="desciption" class="col-md-4 control-label">Content</label>
                                            <div class="col-md-6">
                                                <textarea id="content" type="text" class="form-control" name="content" value="">{{$row->content}}</textarea>
                                                @if ($errors->has('content'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('content') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                                <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.notifi-getNotifi')}}">Cancel</a>
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