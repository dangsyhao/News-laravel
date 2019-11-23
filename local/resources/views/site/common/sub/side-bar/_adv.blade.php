<div class="block" >
    <div class="block-header"></div>
    @if(isset($advertise))
    @foreach($advertise as $row)
        <div class="content">
            <div class="adv">
                <a  href="{{$row->link}}" class="title">
                    <img src="{{$row->image_url}}" alt="" />
                </a>
            </div>
        </div>
    @endforeach
    @endif
</div>
