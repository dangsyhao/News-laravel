@extends('admin.app')
@section('content')
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('admin.user.setAdd') }}">
                                        {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}" required autofocus>
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
                                                   value="{{ old('email') }}" required autofocus>
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
                                                   name="phone_number" value="{{ old('phone_number') }}" required
                                                   autofocus>
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('user_cat_id') ? ' has-error' : '' }}">
                                        <label for="user_id" class="col-md-4 control-label">User Role</label>
                                        <div class="col-md-6">
                                            <select id="user_cat_id" name="user_cat_id" class="form-control" required autofocus>
                                                <option selected value="{{ old('user_cat_id') }}">--User Role Options --</option>
                                                @if(isset($author_value))
                                                    @foreach($author_value as $row)
                                                        <option value="{{$row->id}}">{{$row->user_role}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('user_cat_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_cat_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-4 control-label">Address</label>
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control" name="address"
                                                   value="{{ old('address') }}" required autofocus>
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password"
                                                   required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm
                                            Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 