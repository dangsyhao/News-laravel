@extends('author.layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Lọc Bài Đăng</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Lọc Bài Đăng</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                <div class="row mb-2">

                    <div class="col-sm-12 col-md-12">
                        <div id="dataTable_filter" class="dataTables_filter">
                                <form class='form-inline' method='GET' role="form" action="{{route('author.post-getList')}}" >
                                    
                                    <div class="form-group">      
                                        <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Reset</button>
                                    </div>
                                    
                                </form>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                 <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" 
                                            aria-label="Name: activate to sort column descending" style="width: 3px;">ID</th>
                            
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" style="width: 150px;">Tiêu đề</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" style="width: 50px;">Tác giả</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" style="width: 42px;">Chủ đề</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Office: activate to sort column ascending" style="width: 3px;">Lượt xem</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Office: activate to sort column ascending" style="width: 3px;">Trạng thái</th>
                                           
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Age: activate to sort column ascending" style="width: 25px;">Updated</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Start date: activate to sort column ascending" style="width:42px;">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            
                                @if(isset($post_list))
                                    @foreach($post_list as $row)
                                        
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$row->id}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->authorList->name}}</td>
                                                <td>{{$row->postCategory->value}}</td>
                                                <td>{{$row->view}}</td>
                                                <td>
                                                    @if($row->status=='1')
                                                        <span class='text-danger'>{{"Chưa duyệt"}}</span>
                                                    @endif

                                                    @if($row->status=='2')
                                                        <span class='text-primary'>{{"Đã duyệt"}}</span>
                                                    @endif

                                                    @if($row->status=='0')
                                                        <span class='text-danger'>{{"Lưu nháp"}}</span>
                                                    @endif
                                                
                                                </td>
                                                <td>{{$row->updated_at}}</td>
                                                <td class='d-flex flex-row'>
                                                    <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('author.post-show',['id'=>$row->id])}}">show</a> 
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
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                            
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
     </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


@endsection 