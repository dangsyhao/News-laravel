@extends('admin.app')
@section('content')
<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.navBar-add') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('post_category_id') ? ' has-error' : '' }}">
                                    <label for="post_category_id" class="col-md-4 control-label">Values</label>
                                    <div class="col-md-6">
                                        <select id="post_category_id"  name="post_category_id" class="form-control" required autofocus>
                                            <option selected value="{{ old('post_category_id') }}">-Chọn Values-</option>
                                    @if(isset($post_category))
                                        @foreach($post_category as $row)
                                            <option value="{{$row->id}}">{{$row->value}}</option>
                                        @endforeach
                                    @endif
                                        </select>
                                        @if ($errors->has('post_category_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('post_category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                    <label for="url" class="col-md-4 control-label">URL</label>
                                    <div class="col-md-6">
                                        <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required autofocus>
                                        @if ($errors->has('url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-md-4 control-label">Sort</label>
                                    <div class="col-md-6">
                                        <textarea id="sort" type="text" class="form-control" name="sort" value="{{ old('sort') }}" required autofocus></textarea>
                                        @if ($errors->has('sort'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sort') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                        <a role="button" class="btn btn-primary " href="{{route('admin.navBar-getNavBar')}}">Cancel</a>
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