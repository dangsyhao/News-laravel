@extends('layout-master.dashboard.app')
@section('content')
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <form class='form-inline' method='GET' role="form" action="{{route('admin.post.getPost')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name='get_post' value="get_post_action">
                            <div class="form-group">
                                <select name="user_id" class="form-control">
                                    <option value='none'>-- Sellect Authors --</option>
                                    @foreach($Authors as $items)
                                        <option @if(isset($_REQUEST['user_id']) && $_REQUEST['user_id'] == $items['id']) {{'selected'}} @endif value="{{$items['id']}}">{{$items['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="post_category_id" class="form-control ml-2">
                                    <option value='none'>-- Sellect Categories --</option>
                                    @foreach($Post_cats as $items)
                                        <option @if(isset($_REQUEST['post_category_id']) && $_REQUEST['post_category_id'] == $items['id']){{'selected'}}@endif value="{{$items['id']}}">{{$items['post_cat_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="status" class="form-control ml-2">
                                    <option value='none'>-- Sellect Status --</option>
                                    @foreach($post_info['status'] as $items)
                                        @if($items == '1')
                                            {{ $value = 'Chưa duyệt' }}
                                        @elseif($items == '2')
                                            {{ $value = 'Đã duyệt' }}
                                        @elseif($items == '3')
                                            {{ $value = 'Trang nhất' }}
                                        @endif
                                        <option value="{{$items}}" @if(isset($_REQUEST['status']) && $_REQUEST['status'] == $items) {{'selected'}}@endif >
                                            <span>{{$value}}</span>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if(isset($post_info))
                                <div class="form-group">
                                    <select name="updated_at" class="form-control ml-2">
                                        <option selected value='none' selected>-- Select Date --</option>
                                        @foreach($post_info['updated_at'] as $update_at_value)
                                            <option value="{{$update_at_value}}" @if(isset($_REQUEST['updated_at']) && $_REQUEST['updated_at'] == $update_at_value) {{'selected'}}@endif>
                                                {{$update_at_value}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Filter</button>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.post.getPost')}}">
                                    <button type="button" class="btn btn-sm btn-outline-primary ml-2">Reset</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                           role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 150px;">Tiêu đề
                            </th>
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 50px;">Tác giả
                            </th>
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 42px;">Chủ đề
                            </th>
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 3px;">Lượt xem
                            </th>
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 3px;">Trạng thái
                            </th>

                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Age: activate to sort column ascending" style="width: 25px;">Updated
                            </th>
                            <th   tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Start date: activate to sort column ascending" style="width:42px;">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $row)
                                <tr role="row" class="odd">
                                    <td><strong>{{$row->title}}</strong></td>
                                    <td>
                                        @if(isset($row->getAuthorByUsersTable))
                                            {{$row->getAuthorByUsersTable->name}}
                                        @endif
                                    </td>
                                    <td>@if(isset($row->getPostCategoryTable->post_cat_name))
                                            {{$row->getPostCategoryTable->post_cat_name}}
                                        @endif
                                    </td>
                                    <td>{{$row->view}}</td>
                                    <td>
                                        @if($row->status =='1')
                                            <span class='text-danger'>Chưa duyệt</span>
                                        @endif
                                        @if($row->status =='2')
                                            <span class='text-primary'>Đã duyệt</span>
                                        @endif
                                        @if($row->status =='3')
                                            <span class='text-success'>Trang Nhất</span>
                                        @endif
                                    </td>
                                    <td>@if(isset($update_at_value)){{$update_at_value}} @endif</td>
                                    <td class='d-flex flex-row'>
                                        <a role="button" class="btn btn-sm btn-outline-primary mr-1"
                                           href="{{route('admin.postList-show',['post_id'=>$row->id])}}">show</a>
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
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                        <!--Showing 1 to 10 of 57 entries!--></div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            @if(! empty($posts) && $posts->count() >= 10)
                                {{$posts->links()}}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection