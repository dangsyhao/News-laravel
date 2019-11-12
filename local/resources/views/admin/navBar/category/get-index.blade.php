@extends('admin.app')
@section('content')
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <a role="button" class="btn btn-outline-primary" href="{{route('admin.menu.category.getAdd')}}">Add</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                             <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 5px;">Num</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 120px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 120px;">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending" style="width: 100px;">Updated at</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending" style="width:50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cate_menu))
                                @foreach($cate_menu as $row)
                             <tr role="row" class="odd">
                                <td class="sorting_1">{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->updated_at}}</td>
                                <td class='d-flex flex-row'>
                                    <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('admin.menu.category.getEdit',['id'=>$row->id])}}">Edit</a>
                                    <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('admin.menu.category.del',['id'=>$row->id])}}">Del</a>
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
                    @if(isset($cate_menu))
                        {{$cate_menu->links()}}
                    @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 