@extends('layout-master.dashboard.app')
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
                <label for="image_avatar" class="col-md-4 control-label"></label>
                <div class="col-md-6">
                    <div>
                        <div class="get-images-popup">
                            <img id="img-img-ur-upload" src="{{url('/public/common/assets/images/image-post-none.png')}}" alt="Post feature image" />
                            <input id="input-img-ur-upload" type="hidden" class="form-control" name="image_avatar" value="{{ old('image_avatar') }}" required autofocus>
                        </div>
                        <button type="button" id='call-images-upload-box' class='btn btn-sm btn-outline-primary'>Chọn ảnh</button>
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
                                <option value="{{$row->id}}">{{$row->post_cat_name}}</option>
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
                <textarea name="_content" id="_content" rows="10" cols="80"
                          placeholder="Tạo nội dung bài viết của bạn tại đây!">
                </textarea>
                <script>
                    CKEDITOR.replace('_content');
                </script>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-sm btn-outline-danger'>Preview</button>
            </div>
        </form>
    </div>
@endsection