<div class="block block-side-bar block-side-bar-adv" >
    <div class="block-header">
             <span class="block-title">
                 Quảng Cáo :
                 <span class="phone" style="text-align:right">
                        <i class="fa fa-phone-square" style="font-size: large"></i> 0962.659.157
                 </span>
             </span>
    </div>
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
