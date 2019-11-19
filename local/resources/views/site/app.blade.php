@include('site.header')
<!-- header-section-starts -->
<div class="container">
	<div class="news-paper">
		@include('site.common.header')
		@include('site.common.main-menu')
		<div class="clearfix"></div>
			<div class="main-content">
				<div class="col-md-9 total-news">
					<!-- Content Master -->
					@yield('content')
					<!-- Content Master -->
					@include('site.common.photos-galery')
				</div>
			</div>
			@include('site.common.side-bar')
		@include('site.common.footer')
	</div>
</div>
@include('site.footer')