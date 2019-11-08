@extends('author.app')
@section('content')
    <div class="form-group col-md-12">
        <form class="form-horizontal" role="form" method="POST" action="{{route('author.post-add')}}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Title</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required
                           autofocus>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('image_avatar') ? ' has-error' : '' }}">
                <label for="image_avatar" class="col-md-4 control-label">Image Avatar URL</label>
                <div class="col-md-6">
                    <div class='d-flex flex-row'>
                        <input id="image_avatar" type="text" class="form-control" name="image_avatar"
                               value="{{ old('image_avatar') }}" required autofocus>
                        <a role='button' id='login-window' class='btn btn-sm btn-outline-primary ml-2'
                           href="#get_images_box">Chọn ảnh</a>
                    </div>
                    @if ($errors->has('image_avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image_avatar') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('post_category_id') ? ' has-error' : '' }}">
                <label for="post_category_id" class="col-md-4 control-label">Category</label>
                <div class="col-md-6">
                    <select id="post_category_id" name="post_category_id" class="form-control" required autofocus>
                        <option selected value="{{ old('post_category_id') }}">-Chọn Chủ đề bài viết-</option>
                        @if(isset($post_category))
                            @foreach($post_category as $row)
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
                    <textarea id="quotes_content" type="text" class="form-control" name="quotes_content"
                              value="{{ old('quotes_content') }}" required autofocus></textarea>
                    @if ($errors->has('quotes_content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('quotes_content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <a role='button' id='login-window' class='btn btn-sm btn-outline-primary' href="#get_images_box">Chọn
                    ảnh</a>
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    This is my textarea to be replaced with CKEditor.
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('editor1');
                </script>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-md btn-danger'>Xem Demo</button>
            </div>
        </form>
    </div>
@endsection