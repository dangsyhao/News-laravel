<span class="menu"></span>
<div class="menu-strip">
    <ul>
        @if(isset($nav_bar))
            @foreach($nav_bar as $row)
                <li>
                    <a href="{{$row->url}}">{{$row->getMenuCategoryTable->post_cat_name}}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
<!-- script for menu -->
<script>
    $( "span.menu" ).click(function() {
        $( ".menu-strip" ).slideToggle( "slow", function() {
            // Animation complete.
        });
    });
</script>
<!-- script for menu -->