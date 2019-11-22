<div class="page-index" id='trang_nhat'>
    <div class="main-title-head">
        <h3>Trang Nhất</h3>
        <div class="clearfix"></div>
    </div>
    <div class="page-index-grids">
    @if( ! empty($post_data['post_index']))
        @foreach($post_data['post_index'] as $row)
            <div class="page-index-grid">
                <a href={{getPostLinkById($Posts,$row->id)}} class="title">
                    <img src="{{$row->image_avatar}}" alt="" />
                    <p>{{$row->title}}</p>
                </a>
                <p>{{$row->quotes_content}}</p>
            </div>
        @endforeach
    @endif
        <div class="clearfix"></div>
    </div>
</div>
