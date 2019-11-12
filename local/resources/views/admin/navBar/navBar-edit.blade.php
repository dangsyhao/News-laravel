@extends('admin.app')
@section('content')
<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(isset($Nav_bar))
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.navBar-edit',['id'=>$Nav_bar->id]) }}">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('menu_cate') ? ' has-error' : '' }}">
                                    <label for="menu_cate" class="col-md-4 control-label">Menu Categories</label>
                                    <div class="col-md-6">
                                        <select id="menu_cate"  name="menu_cate" class="form-control" autofocus required>
                                            <option >-- Menus Register --</option>
                                            @foreach($Menu_cate as $value)
                                                @if(isset($Nav_bar->getMenuCategoryTable->id) && $value->id = $Nav_bar->getMenuCategoryTable->id)
                                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                @else
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('menu_cate'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('menu_cate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-4 control-label">Menu Options</label>
                                    <div class="col-md-6">
                                        <select id="field_get_menu_type_select_tag"  name="link_type" class="form-control" required autofocus>
                                            <option value="link" selected >Link</option>
                                            <option value="page_archive" >Page Archive</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group{{ $errors->has('post_category_id') ? ' has-error' : '' }}" id="field_page_archive" style="display: none">
                                        <label for="post_category_id" class="col-md-4 control-label">Page Archive</label>
                                        <div class="col-md-6">
                                            <select id="field_post_category_id_select_tag"  name="post_category_id" class="form-control" autofocus disabled>
                                                <option >-- Categories Choose --</option>
                                                    @foreach($Post_cate as $value)
                                                        @if(isset($Nav_bar->getPostCategoryTable->id) && $value->id = $Nav_bar->getPostCategoryTable->id)
                                                        <option value="{{$value->id}}" selected>{{$value->value}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('post_category_id'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('post_category_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}" id="field_link" style="display: none">
                                        <label for="url" class="col-md-4 control-label">Link</label>
                                        <div class="col-md-6">
                                            <input id="url" type="text" class="form-control" name="url" value="{{ $Nav_bar->url }}" autofocus disabled>
                                            @if ($errors->has('url'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-md-4 control-label">Order</label>
                                    <div class="col-md-6">
                                        <input id="sort" type="text" class="form-control" name="sort" value="{{ $Nav_bar->sort }}" required autofocus>
                                        @if ($errors->has('sort'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sort') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea id="description" type="text" class="form-control" name="description" required autofocus>{{$Nav_bar->description}}</textarea>
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
                                        <a role="button" class="btn btn-primary " href="{{route('admin.navBar-getNavBar')}}">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 