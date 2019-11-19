<div class="posts">
    <div class="left-posts">
        @if(isset($chinh_tri_link))
            @include('site.front-page.sub._chinh-tri')
        @endif

        @if(isset($kinh_te_link))
                @include('site.front-page.sub._kinh-te')
        @endif

        @if(isset($giao_duc_link))
                @include('site.front-page.sub._giao-duc')
        @endif

    </div>
    <div class="right-posts">
        @if(isset($quoc_te_index))
            @include('site.front-page.sub._quoc-te')
        @endif

        @if(isset($van_hoa_index))
                @include('site.front-page.sub._van-hoa')
        @endif

        @if(isset($y_te_index))
                @include('site.front-page.sub._y-te')
        @endif

        @if(isset($phap_luat_index))
                @include('site.front-page.sub._phap-luat')
        @endif

        @if(isset($ban_doc_index))
                @include('site.front-page.sub._ban-doc')
        @endif

        @if(isset($the_thao_index))
                @include('site.front-page.sub._the-thao')
        @endif
    </div>
    <div class="clearfix"></div>
</div>
