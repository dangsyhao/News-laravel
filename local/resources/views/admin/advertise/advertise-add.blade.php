@extends('admin.app')
@section('content')
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.advertise-add') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                                        <label for="customer" class="col-md-4 control-label">Customer Name</label>
                                        <div class="col-md-6">
                                            <input id="customer" type="text" class="form-control" name="customer" value="{{ old('customer') }}" required autofocus>
                                            @if ($errors->has('customer'))
                                        </div>
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('customer') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                     <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                                        <label for="image_url" class="col-md-4 control-label"></label>
                                        <div class="col-md-6">
                                            <div>
                                                <div class="get-images-popup">
                                                    <img id="img-img-ur-upload" alt="{{'Images feature not selected'}}" />
                                                    <input id="input-img-ur-upload" type="hidden" class="form-control" name="image_url" value="{{ old('image_url') }}" required autofocus>
                                                </div>
                                                <button type="button" id='call-images-upload-box' class='btn btn-sm btn-outline-primary'>Chọn ảnh</button>
                                            </div>
                                            @if ($errors->has('image_url'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                        <label for="link" class="col-md-4 control-label">Link</label>
                                        <div class="col-md-6">
                                            <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus>
                                            @if ($errors->has('link'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('link') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">
                                        <label for="info" class="col-md-4 control-label">Informations</label>
                                        <div class="col-md-6">
                                            <textarea id="info" type="text" class="form-control" name="info" value="{{ old('info') }}" required autofocus></textarea>
                                            @if ($errors->has('info'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('info') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit"  class="btn btn-outline-primary btn-sm">Submit</button>
                                            <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.advertise-getAdvertise')}}">Cancel</a>
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
<!--.images box,!-->
@endsection