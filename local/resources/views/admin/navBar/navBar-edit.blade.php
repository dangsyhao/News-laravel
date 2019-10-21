@extends('admin.layouts.app')
@section('content')

<!-- CSS Image-dialog!-->
<link href="{{asset('public/author/image-dialog/image-dialog.css')}}" rel="stylesheet">

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit - Date</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Edit Date Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.navBar-edit') }}">
                    {{ csrf_field() }}

                @if(isset($nav_bar_edit))
                    @foreach($nav_bar_edit as $row)
                    
                        <input  type="hidden" name="id" value="{{$row->id}}">

                         <div class="form-group{{ $errors->has('post_category_id') ? ' has-error' : '' }}">
                            <label for="post_category_id" class="col-md-4 control-label">Values</label>
                            <div class="col-md-6">
                                <select id="post_category_id"  name="post_category_id" class="form-control" required autofocus>                   
                                    <option selected value="{{$row->post_category_id}}">{{$row->postCategory->value}}</option>
                            @if(isset($post_category))
                                @foreach($post_category as $row2)       
                                    <option value="{{$row2->id}}">{{$row2->value}}</option>           
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
                                <input id="description" type="text" class="form-control" name="description" value="{{$row->description}}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-6 control-label">Url (etc : "kinh te")</label>
                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" name="url" value="{{$row->postCategory->value}}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                            <label for="desciption" class="col-md-4 control-label">Sort</label>

                            <div class="col-md-6">
                                <textarea id="sort" type="text" class="form-control" name="sort" value="">{{$row->sort}}</textarea>

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
        </div>
     </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

@endsection 