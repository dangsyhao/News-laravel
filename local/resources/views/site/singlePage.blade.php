@extends('site.app')
@section('content')
<div class="grids">
	@if(isset($post_list))
		@foreach($post_list as $row)
		<div class="grid box">
			<div class="grid-header">
				<ul class="category-list">
					<h5 class="post-category_head">{{$row->postCategory->value}}</h5>
				</ul>
				<a class="gotosingle" href="#">{{$row->title}}</a>
				<ul>
				<li><span>{{$row->updated_at}}</span></li>
				</ul>
			</div>
			<div class="singlepage">
							<p><strong>{!!$row->quotes_content!!}</strong></p>
							<p>{!!$row->content!!}</p>
							<div class="clearfix"> </div>
						</div>
		</div>
	
			<div class="clearfix"> </div>
    </div>
    
    <ul class="comment-list">
        <h5 class="post-author_head"><strong>Theo</strong>: {{$row->authorList->name}}</h5>
    </ul>
    <div class="content-form">
         <div class="fb-comments" data-href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" data-numposts="5">
		</div>
	</div>

	@endforeach
@endif
	
<div class="clearfix"></div>

@endsection