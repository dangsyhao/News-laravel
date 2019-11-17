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
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('admin.getPostCategoryTable-add') }}">
                                            {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                            <label for="post_cat_name" class="col-md-4 control-label">
                                                Category Name
                                            </label>
                                            <div class="col-md-6">
                                                <input id="post_cat_name" type="text" class="form-control"
                                                       name="post_cat_name" value="{{ old('value') }}" required
                                                       autofocus>
                                                @if ($errors->has('value'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('value') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('post_cat_desc') ? ' has-error' : '' }}">
                                            <label for="post_cat_desc" class="col-md-4 control-label">Description</label>
                                            <div class="col-md-6">
                                                <textarea id="post_cat_desc" class="form-control" name="post_cat_desc" placeholder="{{old('post_cat_desc')}}" required>
                                                </textarea>
                                                @if ($errors->has('post_cat_desc'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('post_cat_desc') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                                    Submit
                                                </button>
                                                <a role="button" class="btn btn-outline-primary btn-sm"
                                                   href="{{route('admin.getPostCategoryTable-post')}}">
                                                    Cancel
                                                </a>
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