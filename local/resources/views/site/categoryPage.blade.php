@extends('site.app')
@section('content')

	<div class="category">
	
		<div class="category-cricket">
		@foreach($post_list_index as $row)
			<h3>{{$row->postCategory->value}}</h3>
		@endforeach
			<div class="category-top">
				<div class="page-index-category" id='trang_nhat'>
					<div class="clearfix"></div>
						<div class="page-index-category-grids">
						@foreach($post_list_index as $row)
							<div class="page-index-category-grid">
								<a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
									<img src="{{$row->image_avatar}}" alt="" />
									<p>{{$row->title}}</p>
								</a>
								<p>{{$row->quotes_content}}</p>
							</div>
							@endforeach
							<div class="clearfix"></div>
						</div>
					<div class="clearfix"></div>		
				</div>

				<div class="category-hot-news">		
					<div class="category-hot-news-news">
					@foreach($post_list_hot_news as $row)
						<div class="category-hot-news-grid">
							<p><a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
							{{$row->title}}</a></p>
						</div>
					@endforeach
					</div>
				</div>
			<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>				
			@foreach($post_list_link as $row)	
				<div class="s-grid-small">
					<div class="sc-image">
						<a  href="{{route('site.singlePage',[
															'post_category'=>str_slug($row->postCategory->value),
															'post_name'=>str_slug($row->title),
															'post_id'=>$row->id
															])}}"><img src="{{$row->image_avatar}}" alt="" /></a>
					</div>
					<div class="sc-text">
						<a class="power"  href="{{route('site.singlePage',[
																			'post_category'=>str_slug($row->postCategory->value),
																			'post_name'=>str_slug($row->title),
																			'post_id'=>$row->id
																			])}}">{{$row->title}}</a>
						<p >{{$row->quotes_content}}</p>
					</div>
					<div class="clearfix"></div>
				</div>
			@endforeach					
		</div>
	<div class="clearfix"></div>

</div>

@endsection