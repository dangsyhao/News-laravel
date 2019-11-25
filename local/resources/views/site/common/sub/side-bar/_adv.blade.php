<div class="block block-side-bar block-side-bar-adv" >
    <div class="block-header">
        <span class="block-title">Quảng Cáo :</span>
        <span class="phone">0962-659-157</span>
    </div>
    <div class="content">
    @if(isset($advertise))
    @foreach($advertise as $row)
            <div class="adv-item">
                <a  href="{{$row->link}}" class="title">
                    <img src="{{$row->image_url}}" alt="" />
                </a>
            </div>

    @endforeach
    @endif
    </div>
</div>
