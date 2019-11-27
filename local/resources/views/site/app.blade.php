@include('site.header')
<!-- header-section-starts -->
	<div class="news-paper">
		@include('site.common.header')
		@include('site.common.main-menu')
		@include('site.common.bread_crum')
		<div class="main-content">
				<div class="feature-content-left">
					<!-- Content Master -->
					@yield('content')
					<!-- Content Master -->
					@include('site.common.photos-galery')
				</div>
				<div class="feature-content-right">
					<div class="side-bar">
						@include('site.common.side-bar')
					</div>
				</div>
				<div class="clearfix"></div>
		</div>
		@include('site.common.footer')
	</div>
@include('site.footer')