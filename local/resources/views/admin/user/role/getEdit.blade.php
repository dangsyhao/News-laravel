@extends('admin.app')
@section('content')
  <div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.role.setEdit') }}">
                                {{ csrf_field() }}
                            @if(isset($User_category))
                                @foreach($User_category as $row)
                                <input  type="hidden" name="id" value="{{$row->id}}">
                                <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                                    <label for="user_role" class="col-md-4 control-label">Value</label>
                                    <div class="col-md-6">
                                        <input id="user_role" type="text" class="form-control" name="user_role" value="{{$row->user_role}}">
                                        @if ($errors->has('user_role'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('user_desc') ? ' has-error' : '' }}">
                                    <label for="desciption" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea id="user_desc" type="text" class="form-control" name="user_desc" value="">{{$row->user_desc}}</textarea>
                                        @if ($errors->has('user_desc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                        <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.user.role.getList')}}">Cancel</a>
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