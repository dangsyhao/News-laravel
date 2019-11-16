@if(!empty($Files))
    @foreach($Files as $key)
        <tr role="row" >
            @foreach($key as $value)
                <td class="file-upload-items" role="button" data-img-id="{{$value['id']}}">
                    @if(strpos($value['file_extension'],'image') >= 0)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="{{$value['file_url']}}" alt="images" title="Click to View Image " height="90px" width="125px">
                        </a>
                    @elseif(strpos($value['file_extension'],'pdf') >= 0)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="{{url('local/storage/app/public/uploads/images/4GpxTgmKHNBBJwOiq7XYoAYsnySqB0cRK221f4Zw.png')}}" alt="pdf-file" title="Click-PDF-file"  height="90px" width="125px">
                        </a>
                    @elseif(strpos($value['file_extension'],'doc') >= 0)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="#1" alt="pdf-file" title="Click-PDF-file"  height="90px" width="125px">
                        </a>
                    @else
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img data={{$value['file_extension']}} src="#2" alt="file-not-found" title="file-not-found"  height="90px" width="125px">
                        </a>
                    @endif
                    <a class="delete-file-items" href="javascript:void(0);" >
                        <img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:40px;height:40px;">
                    </a>
                </td>
            @endforeach
        </tr>
    @endforeach
@endif