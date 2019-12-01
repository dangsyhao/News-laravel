<div class="block block-post-category block-right" id="block-adv-content-right-bottom">
    <div class="block-header"></div>
    <div class="content">
        @if(isset($advertise))
            @foreach($advertise as $row)
                <div class="adv-item">
                    <a  href="{{$row->link}}" class="title">
                        <img src="{{$row->image_url}}" alt="advertise not image" title="{{'click to website '.$row->customer}}" />
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>