@extends('author.layouts.app')
@section('content')

<!-- CSS Image-dialog!-->
  <link href="{{asset('public/author/image-dialog/image-dialog.css')}}" rel="stylesheet">
    <!-- CKEY Editor Page-->
    <script src="{{ asset('public/author/ckeditor/ckeditor.js') }}"></script>

  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Post Temp</li>
      </ol>

      <!-- Example DataTables Card-->
  </div>
    <!-- CkEditor Local-->
     
  <div class="form-group col-md-12">
          <form  class="form-horizontal" role="form" method="POST" action="{{route('author.postTemp-edit')}}" >
          {{ csrf_field() }}
        @if(isset($post_list))
            @foreach($post_list as $row)

             <div class="form-group">
                <input type="hidden"  name="id" value="{{$row->id}}" >
            </div>

          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$row->title}}" required autofocus>

                                @if($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
            </div>

            <div class="form-group{{ $errors->has('image_avatar') ? ' has-error' : '' }}">
                            <label for="image_avatar" class="col-md-4 control-label">Image Avatar URL</label>

                            <div class="col-md-6">
                                <input id="image_avatar" type="text" class="form-control" name="image_avatar" value="{{ $row->image_avatar}}" required autofocus>

                                @if($errors->has('image_avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
            </div>
            <div class="form-group{{ $errors->has('post_category_id') ? ' has-error' : '' }}">
                            <label for="post_category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="post_category_id"  name="post_category_id" class="form-control" required autofocus>        
                                    <option selected value="{{ $row->post_category_id}}">{{ $row->postCategory->value}}</option>
                            @if(isset($post_category))
                                @foreach($post_category as $value)       
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

            <div class="form-group{{ $errors->has('quotes_content') ? ' has-error' : '' }}">
                            <label for="quotes_content" class="col-md-4 control-label">Quotes</label>

                            <div class="col-md-6">

                                <textarea id="quotes_content" type="text" class="form-control" name="quotes_content" required autofocus>{{$row->quotes_content}}</textarea>
                                @if ($errors->has('quotes_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quotes_content') }}</strong>
                                    </span>
                                @endif
                            </div>
            </div>

            <div class="form-group">
                    <a  role='button' id='login-window' class='btn btn-sm btn-outline-primary' href="#login-box">Chọn ảnh</a>

                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                                    {{$row->content}}
                    </textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                    </script>
             </div>
            
        @endforeach
    @endif
            <div class='form-group'>
                    <button type='submit' class='btn btn-md btn-danger' >Submit</button>     
             </div>
          </form>
        </div>
  </div> 

<!-- Example Image Dialog-->

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