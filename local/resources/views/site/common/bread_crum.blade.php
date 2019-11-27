<div class="bread-crumb">
    <nav aria-label="breadcrumb">
        @if(isset($_REQUEST['post_id']))
            @php
            $post_cat_id = getPostById($_REQUEST['post_id'])->post_category_id;
            $post_cat_name = getPostCatById($post_cat_id)->post_cat_name;
            @endphp
            <ol class="breadcrumb" style="width: 30%">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">@php echo $post_cat_name @endphp</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bài Viết</li>
            </ol>
        @elseif(isset($_REQUEST['cat_id']))
            <ol class="breadcrumb" style="width: 20%">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{getPostCatById($_REQUEST['cat_id'])->post_cat_name}}</a></li>
            </ol>
        @else
            <ol class="breadcrumb" style="width: 10%">
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}">Home</a></li>
            </ol>
        @endif
    </nav>
</div>