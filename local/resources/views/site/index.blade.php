@extends('site.app')
@section('content')
		<div class="index">
		
			<div class="page-index" id='trang_nhat'>
						<div class="main-title-head">
							<h3>Trang Nhất</h3>
						
							<div class="clearfix"></div>
						</div>
						<div class="page-index-grids">
						@foreach($page_index as $row)
							<div class="page-index-grid">
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
						
			</div>

			 <div class="hot-news">		
				<div class="hot-news-news">
				@foreach($hot_news as $row)
					<div class="hot-news-grid">
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

		</div>
				
		<div class="posts">
			<div class="left-posts">

			@if(isset($chinh_tri_link))	
				<div class="world-news" id='chinh_tri'>
					<div class="main-title-head">
						<h3>Chính Trị - Xã Hội</h3>
						<div class="clearfix"></div>
					</div>
				@foreach($chinh_tri_index as $row)
					<div class="world-news-grids">
						<div class="world-news-grid">
							<img src="{{$row->image_avatar}}" alt="" />
							<a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">{{$row->title}}</a>
							<p>{{$row->quotes_content}}</p>
							
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach
					<hr>
					<ul>
				@foreach($chinh_tri_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}} </a></li>
				@endforeach	
					</ul>
					<div class="clearfix"></div>	
				</div>
			@endif

				@if(isset($kinh_te_link))	
				<div class="world-news" id='kinhte'>
					<div class="main-title-head">
						<h3>Kinh Tế</h3>
						<div class="clearfix"></div>
					</div>
				@foreach($kinh_te_index as $row)
					<div class="world-news-grids">
						<div class="world-news-grid">
							<img src="{{$row->image_avatar}}" alt="" />
							<a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
							{{$row->title}}</a>
							<p>{{$row->quotes_content}}</p>
							
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach
					<hr>
					<ul>
				@foreach($kinh_te_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}} </a></li>
				@endforeach	
					</ul>
					<div class="clearfix"></div>	
				</div>
			@endif

				@if(isset($giao_duc_link))	
				<div class="world-news" id='giao_duc'>
					<div class="main-title-head">
						<h3>Giáo Dục</h3>
						<div class="clearfix"></div>
					</div>
				@foreach($giao_duc_index as $row)
					<div class="world-news-grids">
						<div class="world-news-grid">
							<img src="{{$row->image_avatar}}" alt="" />
							<a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
							{{$row->title}}</a>
							<p>{{$row->quotes_content}}</p>
							
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach
					<hr>
					<ul>
				@foreach($giao_duc_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}} </a></li>
				@endforeach	
					</ul>
					<div class="clearfix"></div>	
				</div>
			@endif

			</div>

			<div class="right-posts">

			@if(isset($quoc_te_index))
				<div class="desk-grid" id='quoc_te'>
				@foreach($quoc_te_index as $row)
					<h3>Quốc Tế</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
					<ul>
				@foreach($quoc_te_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}}</a></li>
				@endforeach	
					</ul>
					<div class="clearfix"></div>	

				</div>
			@endif

				@if(isset($van_hoa_index))
				<div class="desk-grid" id='van_hoa'>
				@foreach($van_hoa_index as $row)
					<h3>Văn Hóa - Giải Trí</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
						<ul>
					@foreach($van_hoa_link as $row)
							<li> <a href="{{route('site.singlePage',[
																		'post_category'=>str_slug($row->postCategory->value),
																		'post_name'=>str_slug($row->title),
																		'post_id'=>$row->id
																		])}}" class="title">
							{{$row->title}}</a></li>
					@endforeach	
						</ul>
						<div class="clearfix"></div>	

				</div>
			@endif


				@if(isset($y_te_index))
				<div class="desk-grid" id='y_te'>
				@foreach($y_te_index as $row)
					<h3>Văn Hóa - Giải Trí</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
					<ul>
				@foreach($y_te_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}}</a></li>
				@endforeach	
					</ul>
					<div class="clearfix"></div>	

				</div>

			@endif


				@if(isset($phap_luat_index))
				<div class="desk-grid" id='phap_luat'>
				@foreach($phap_luat_index as $row)
					<h3>Pháp Luật</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
					<ul>
				@foreach($phap_luat_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}}</a></li>
				@endforeach	
					</ul>

				</div>
			@endif

				@if(isset($ban_doc_index))
				<div class="desk-grid" id='ban_doc'>
				@foreach($ban_doc_index as $row)
					<h3>Bạn Đọc</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
					<ul>
				@foreach($ban_doc_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}}</a></li>
				@endforeach	
					</ul>

				</div>
			@endif

				@if(isset($the_thao_index))
				<div class="desk-grid" id='the_thao'>
				@foreach($the_thao_index as $row)
					<h3>Thể Thao</h3>
					<div class="desk">
						<table>
						<tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
						{{$row->title}}</a></tr>
						<tr>
							<td><img src="{{$row->image_avatar}}" width="120px" alt="" />
							<td><p>{{$row->quotes_content}}</p>
							</td>
						</tr>
						</table>
					</div>
				@endforeach
					<ul>
				@foreach($the_thao_link as $row)
						<li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
						{{$row->title}}</a></li>
				@endforeach	
					</ul>

				</div>
			@endif

			</div>
			<div class="clearfix"></div>

		</div>
@endsection