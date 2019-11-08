@extends('admin.app')
@section('content')
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.date.setAdd') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('values') ? ' has-error' : '' }}">
                            <label for="values" class="col-md-4 control-label">Values</label>

                            <div class="col-md-6">
                                <input id="values" type="text" class="form-control" name="values" value="{{ old('values') }}" required autofocus>

                                @if ($errors->has('values'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('values') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="desciption" class="col-md-4 control-label">Desciption</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

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
                                <a role="button" class="btn btn-primary " href="{{route('admin.date.getList')}}">Cancel</a>
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

@endsection 