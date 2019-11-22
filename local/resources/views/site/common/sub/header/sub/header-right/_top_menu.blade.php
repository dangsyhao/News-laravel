<div class="top-menu">
    <ul>
        @if(isset($Menus['head-menu']))
            @foreach($Menus['head-menu'] as $menu_item)
            <li>
                <a href="{{$menu_item->page_link}}">
                    {{$menu_item->menu_name}}
                </a>
            </li>{{'|'}}
            @endforeach
        @endif
    </ul>
</div>
