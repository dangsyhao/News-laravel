@extends('admin.app')
@section('content')
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @if(isset($User))
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{route('admin.user.setEdit')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$User->id}}">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{$User->name}}"  required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control" name="email"
                                                   value="{{$User->email}}" disabled>
                                            <input id="email-hidden" type="hidden" class="form-control"
                                                   name="email" value="{{$User->email}}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for="phone_number" class="col-md-4 control-label">Phone</label>
                                        <div class="col-md-6">
                                            <input id="phone_number" type="text" class="form-control"
                                                   name="phone_number" value="{{$User->phone_number}}" required
                                                   autofocus>
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('user_cat_id') ? ' has-error' : '' }}">
                                        <label for="user_cat_id" class="col-md-4 control-label">Values</label>
                                        <div class="col-md-6">
                                            <select id="user_cat_id" name="user_cat_id"
                                                    class="form-control admin-select-edit">
                                                @foreach($user_cat_id as $role_item):
                                                <option value="{{$role_item->id}}" @if($role_item->id == $User->user_cat_id){{'selected'}} @endif>{{$role_item->user_role}}</option>
                                                @endforeach;
                                            </select>
                                            @if ($errors->has('user_cat_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_cat_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-4 control-label">Address</label>
                                        <div class="col-md-6">
                                            <textarea id="address" type="text" class="form-control"
                                                      name="address">{{$User->address}}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                            <a role="button"  class="btn btn-outline-primary btn-sm"
                                               href="{{route('admin.user.getList')}}">Cancel</a>
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