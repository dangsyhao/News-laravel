@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Post-List</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Mục Bài Viết</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                <div class="row mb-2">
                        <div class="col-sm-12 col-md-12">
                            <div id="dataTable_filter" class="dataTables_filter">
                                    <form class='form-inline' method='GET' role="form" action="{{route('admin.postList-filter')}}" >
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                                <select  name="author_id" class="form-control">
                                                    <option selected value='none'>-Tên Tác giả-</option>
                                             
                                                    @foreach($author_fill as $row)
                                                    <option value="{{$row->author_id}}">{{$row->authorList->name}}</option>
                                                    @endforeach
                                                 
                                                </select>
                                        </div>

                                        <div class="form-group">
                                                 <select name="post_category_id" class="form-control ml-2">
                                                    <option selected value='none'>-Chủ đề-</option>
                                                    @foreach($post_category_fill as $row)
                                                    <option value="{{$row->post_category_id}}">{{$row->postCategory->value}}</option>  
                                                    @endforeach
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="status" class="form-control ml-2">
                                                    <option selected value='none'>-Trạng thái-</option>
                                                @foreach($status_fill as $row)
                                                   
                                                    @if($row->status=='1')
                                                    <option value="{{$row->status}}">
                                                        <span>Chưa duyệt</span>
                                                    </option>
                                                    @endif

                                                     @if($row->status=='2')
                                                    <option value="{{$row->status}}">
                                                        <span>Đã duyệt</span>
                                                    </option>
                                                    @endif

                                                     @if($row->status=='3')
                                                    <option value="{{$row->status}}">
                                                        <span>Trang nhất</span>
                                                    </option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                     

                                @if(isset($updated_fill))
                                      
                                        <div class="form-group">
                                            <select name="updated_at" class="form-control ml-2">
                                                 <option selected value='none'>-Ngày tháng-</option>
                                                 @foreach($updated_fill as $row) 
                                                    <option value="{{str_limit($row->updated_at,10,null)}}">{{str_limit($row->updated_at,10,null)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                
                                 @endif 
                                        <div class="form-group">      
                                            <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Lọc</button>
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
                                    <td><strong>{{$row->title}}</strong></td>
                                    
                                    <td>
                                    @if(isset($row->authorList))
                                         {{$row->authorList->name}}
                                    @endif
                                    </td>
                                    
                                    <td>{{$row->postCategory->value}}</td>
                                    <td>{{$row->view}}</td>
                                    <td>
                                        @if($row->status=='1')
                                            <span class='text-danger'>Chưa duyệt</span>
                                        @endif

                                        @if($row->status=='2')
                                        <span class='text-primary'>Đã duyệt</span>
                                        @endif

                                        @if($row->status=='3')
                                        <span class='text-success'>Trang Nhất</span>
                                        @endif

                                    </td>
                                  
                                    <td>{{$row->updated_at}}</td>
                                    <td class='d-flex flex-row'>
                                        <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('admin.postList-show',['id'=>$row->id])}}">show</a> 
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
                        @if(isset($post_list))
                               {{$post_list->links()}} 
                        @endif
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