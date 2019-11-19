@extends('layout-master.dashboard.app')
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

                                <div class="form-group{{ $errors->has('menu_cat') ? ' has-error' : '' }}">
                                    <label for="menu_cat" class="col-md-4 control-label">Menu Categories</label>
                                    <div class="col-md-6">
                                        <select id="menu_cat"  name="menu_cat" class="form-control" autofocus required>
                                            <option value="">-- Menus Register --</option>
                                            @foreach($Menu_cate as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('menu_cat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('menu_cat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('menu_name') ? ' has-error' : '' }}">
                                    <label for="menu_name" class="col-md-4 control-label">Menu Name</label>
                                    <div class="col-md-6">
                                        <input id="menu_name" type="text" class="form-control" name="menu_name" value="{{ old('menu_name') }}" autofocus required>
                                        @if ($errors->has('menu_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('menu_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <label  class="col-md-4 control-label">Menu Options</label>
                                    <div class="col-md-6">
                                        <select id="field_get_menu_type_select_tag"  name="link_type" class="form-control" required autofocus>
                                            <option value="link" selected >Link</option>
                                            <option value="page_archive" >Page Archive</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group{{ $errors->has('post_cat_id') ? ' has-error' : '' }}" id="field_page_archive" style="display: none">
                                        <label for="post_cat_id" class="col-md-4 control-label">Page Archive</label>
                                        <div class="col-md-6">
                                            <select id="field_post_category_id_select_tag"  name="post_cat_id" class="form-control" autofocus disabled>
                                                <option>-- Categories Choose --</option>
                                                @if(isset($post_category))
                                                    @foreach($post_category as $row)
                                                        <option value="{{$row->id}}">{{$row->value}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('post_cat_id'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('post_cat_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}" id="field_link" style="display: none">
                                        <label for="link" class="col-md-4 control-label">Link</label>
                                        <div class="col-md-6">
                                            <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" autofocus disabled>
                                            @if ($errors->has('link'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                        <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.navBar-getNavBar')}}">Cancel</a>
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