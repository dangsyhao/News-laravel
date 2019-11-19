@extends('layout-master.dashboard.app')
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
                        <tr><th scope="col" >Upload Items</th></tr>
                    </thead>
                    <tbody id="load-files-items-by-ajax">
                        <!--Load-ajax-result!-->
                        @include('common.file-manager.files-result-ajax')
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