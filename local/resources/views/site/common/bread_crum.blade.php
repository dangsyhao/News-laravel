<ul class="breadcrumb">
    @if(isset($_REQUEST['post_id']))
        @php
        $post_cat_id = getPostById($_REQUEST['post_id'])->post_category_id;
        $post_cat_name = getPostCatById($post_cat_id)->post_cat_name;
        @endphp
        <li><a href="#">Home</a></li>
        <li><a href="#">@php echo $post_cat_name @endphp</a></li>
        <li><a href="#">Bài Viết</a></li>
    @elseif(isset($_REQUEST['cat_id']))
        <li><a href="#">Home</a></li>
        <li><a href="#">{{getPostCatById($_REQUEST['cat_id'])->post_cat_name}}</a></li>
    @else
        <li><a href="#">Home</a></li>
    @endif
</ul>
