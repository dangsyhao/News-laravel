@if(!empty($Files))
    @foreach($Files as $key)
        <tr role="row" >
            @foreach($key as $value)
                <td class="file-upload-items" role="button" data-img-id="{{$value['id']}}">
                    @if(strpos($value['file_extension'],'image') > -1)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="{{$value['file_url']}}" alt="images" title="Click to View Image " height="90px" width="125px">
                        </a>
                    @elseif(strpos($value['file_extension'],'pdf') > -1)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="{{url('backend/common/assets/images/pdf-icon.png')}}" alt="pdf-file" title="Click-PDF-file"  height="90px" width="125px">
                        </a>
                    @elseif(strpos($value['file_extension'],'msword') > -1)
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="{{url('backend/common/assets/images/microsoft-word-icon.png')}}" alt="ms-world-file" title="Click-PDF-file"  height="90px" width="125px">
                        </a>
                    @else
                        <a href="{{$value['file_url']}}" target="_blank">
                            <img src="#2" alt="file-not-found" title="file-not-found"  height="90px" width="125px">
                        </a>
                    @endif
                    <a class="delete-file-items" href="javascript:void(0);" >
                        <img src="{{url('backend/common/assets/images/icon/delete-btn.svg')}}" >
                    </a>
                </td>
            @endforeach
        </tr>
    @endforeach
@endif