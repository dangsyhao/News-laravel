@extends('admin.app')
@section('content')
        <div class="table-responsive" id="Is-Files-Manager-page">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row ">
                    <div class="col-md-12">
                        <button type="button" id="call-images-upload-box" class="btn btn-sm btn-outline-primary">Upload</button>
                    </div>
                </div>
                <table class="table table-bordered dataTable" id="dataTable"  cellspacing="0" role="grid" >
                    <thead>
                        <tr>
                            <th scope="col" >Upload Items</th>
                        </tr>
                    </thead>
                    <tbody id="load-result-files-manager-by-ajax">
                    @if(isset($Files))
                        @foreach($Files as $key)
                            <tr role="row" >
                                @foreach($key as $value)
                                <td class="file-upload-items" id="file-upload-items">
                                    @if($value['ext'] !== 'pdf')
                                        <a href="{{$value['url']}}" target="_blank">
                                            <img src="{{$value['url']}}" alt="images" title="Click to View Image " height="90px" width="125px">
                                        </a>
                                        <a class="remImage" href="#" id="delete" type="button">
                                            <img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:40px;height:40px;">
                                        </a>
                                    @else
                                            <a href="{{$value['url']}}" target="_blank">
                                                <img src="{{url('local/storage/app/public/uploads/images/4GpxTgmKHNBBJwOiq7XYoAYsnySqB0cRK221f4Zw.png')}}" alt="pdf-file" title="Click-PDF-file"  height="90px" width="125px">
                                            </a>
                                            <a class="remImage" href="#" id="delete" role="button">
                                                <img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:40px;height:40px;">
                                            </a>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><!--Showing 1 to 10 of 57 entries!--></div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                @if(isset($date_date))
                                    {{$date_date->links()}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection