@extends('layout-master.dashboard.app')
@section('content')
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                <div class="row mb-2">
                    <div class="col-sm-12 col-md-12">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.notifi-getAdd')}}">Add</a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                 <tr role="row">
                                    <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" style="width: 120px;">Title</th>
                                    <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending" style="width: 120px;">Content</th>

                                    <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Age: activate to sort column ascending" style="width: 100px;">Update</th>
                                    <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Start date: activate to sort column ascending" style="width:50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($notifi_list))
                                    @foreach($notifi_list as $row)
                                 <tr role="row" class="odd">
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->content}}</td>
                                    <td>{{$row->updated_at}}</td>
                                    <td class='d-flex flex-row'>
                                        <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('admin.notifi-getEdit',['id'=>$row->id])}}">Edit</a>
                                        <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('admin.notifi-read',['id'=>$row->id])}}">Show</a> 
                                        <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('admin.notifi-del',['id'=>$row->id])}}">Del</a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><!--Showing 1 to 10 of 57 entries!--></div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                @if(isset($notifi_list) && $notifi_list->count() >= 10)
                                    {{$notifi_list->links()}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
     </div>

@endsection 