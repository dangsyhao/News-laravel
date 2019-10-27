@extends('admin.layouts.app')
@section('content')
<!-- CSS Image-dialog!-->
<link href="{{asset('public/author/image-dialog/image-dialog.css')}}" rel="stylesheet">

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Add Images</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Thêm Images Gallery</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.imageGallery-add') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('image_category') ? ' has-error' : '' }}">
                            <label for="image_category" class="col-md-4 control-label">Images Category</label>

                            <div class="col-md-6">
                                <input id="image_category" type="text" class="form-control" name="image_category" value="{{ old('image_category') }}" required autofocus>

                                @if ($errors->has('image_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                            <label for="image_url" class="col-md-4 control-label">Image Url</label>

                            <div class="col-md-6">
                                <div class='d-flex flex-row'>   
                                    <input id="image_url" type="text" class="form-control" name="image_url" value="{{ old('image_url') }}" required autofocus>
                                    <a  role='button' id='login-window' class='btn btn-sm btn-outline-primary ml-2' href="#login-box">Chọn ảnh</a>
                                </div>
                                @if ($errors->has('image_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                <a role="button" class="btn btn-primary " href="{{route('admin.imageGallery-getList')}}">Cancel</a>
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
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>



<!---Javascript And JQủey-!-->
<div class="login" id="login-box">
    <div class='head d-flex flex-row'>
        <strong class='text text-primary col-md-11 mt-2'>Image Dialog</strong>
        <a role="button" class="close btn btn-sm btn-outline-primary mt-2 ">x</a>
    </div>  
 
<div class="row m-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                 <tr role="row">
                                   
                                    <th class=" col-md-7 col-sm-7 " tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending">Image Names
                                    </th>
                                    <th class="col-md-5 col-sm-5 " tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" >Actions
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($image_name))
                                    @foreach($image_name as $key=>$value)
                                 <tr role="row" class="odd">
                    
                                    <td><img src="{{asset('local/storage/app')}}/{{$value}}" alt="Smiley face" height="90px" width="125px"></td>
                                    <td>
          
                                        <input type='text' class='form-control col-md-5 col-sm-3 mr-5' name='image_path' value="{{asset('local/storage/app')}}/{{$value}}" id="{{$value}}">

                                        <button class="btn btn-md btn-outline-danger mr-1" onclick="myFunction('{{$value}}')">Copy Clipboard</button> 
                                    </td>
                                </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>

   </div>
                

</div>



<!---Javascript And JQủey-!-->

    <script >
        $(document).ready(function() {
            $('a#login-window').click(function() {
                //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
                var loginBox = $(this).attr('href');
        
                //cho hiện hộp đăng nhập trong 300ms
                $(loginBox).fadeIn(300);
        
                // thêm phần tử id="over" vào sau body
                $('body').append('<div id="over">');
                $('#over').fadeIn(300);
        
                return false;
        });
        
        // khi click đóng hộp thoại
        $(document).on('click', "a.close, #over", function() {
            $('#over, .login').fadeOut(300 , function() {
                $('#over').remove();
            });
            return false;
        });

        });
        </script>

        <script>
    /* -------Copy Clipboard Function----- */

                function myFunction(id_value) {
                var copyText = document.getElementById(id_value);
                copyText.select();
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
                }
            </script>

@endsection 