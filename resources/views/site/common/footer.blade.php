<div class="footer text-center">
    <div class="bottom-menu">
        <ul>
            @if(isset($Menus['main-menu']))
                @foreach($Menus['main-menu'] as $item)
                <li><a href="{{$item->page_link}}">{{$item->menu_name}}</a></li> |
                @endforeach
            @endif
        </ul>
    </div>
    <div class="copyright text-center">
        <p>The Da-Nang News &copy; Developer : Dang Sy Hao | Powered By : Laravel Framework
    </div>
</div>
