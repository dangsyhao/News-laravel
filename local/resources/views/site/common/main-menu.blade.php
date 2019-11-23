<div class="menu-strip">
    <ul>
        @if(isset($Menus['main-menu']))
            @foreach($Menus['main-menu'] as $row)
                <li>
                    <a href="{{$row->page_link}}">{{$row->menu_name}}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
