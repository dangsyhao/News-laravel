<div class="menu-strip">
    <ul>
        @if(isset($Menus['main-menu']))
            <li>
                </i><a href="{{url('/')}}">
                    <i class="fa fa-home" style="font-size: 1.2em"></i>
                </a>
            </li>
            @foreach($Menus['main-menu'] as $row)
                <li>
                    <a href="{{$row->page_link}}">{{$row->menu_name}}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
