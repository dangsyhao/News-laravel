@extends('layout-master.dashboard.app')
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
                                <div class="form-group{{ $errors->has('post_cat_name') ? ' has-error' : '' }}">
                                    <label for="post_cat_name" class="col-md-4 control-label">Category Name</label>
                                    <div class="col-md-6">
                                        <input id="post_cat_name" type="text" class="form-control" name="post_cat_name" value="{{$row->post_cat_name}}">
                                        @if ($errors->has('post_cat_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('post_cat_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                        <div class="form-group{{ $errors->has('post_cat_slug') ? ' has-error' : '' }}">
                                            <label for="post_cat_slug" class="col-md-4 control-label">Category Name</label>
                                            <div class="col-md-6">
                                                <input id="post_cat_slug" type="text" class="form-control" name="post_cat_slug" value="{{$row->post_cat_slug}}">
                                                @if ($errors->has('post_cat_slug'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('post_cat_slug') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                <div class="form-group{{ $errors->has('post_cat_desc') ? ' has-error' : '' }}">
                                    <label for="desciption" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea id="post_cat_desc" type="text" class="form-control" name="post_cat_desc" required>{{$row->post_cat_desc}}</textarea>
                                        @if ($errors->has('post_cat_desc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('post_cat_desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                        <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.getPostCategoryTable-post')}}">Cancel</a>
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