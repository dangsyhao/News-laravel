@extends('admin.app')
@section('content')
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <form class='form-inline' method='GET' role="form" action="{{route('admin.navBar-getNavBar')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name='get_post' value="get_post_action">
                            <div class="form-group">
                                <select name="menu_cat_id" class="form-control">
                                    <option value='none'>-- Menu options --</option>
                                    @foreach($Menu_cat as $items)
                                        <option value="{{$items->id}}"
                                            @if(isset($_REQUEST['menu_cat_id']) && $_REQUEST['menu_cat_id'] == $items->id)
                                            {{'selected'}}
                                            @else
                                                @if(isset($Nav_bar[0]->menu_cat) && $Nav_bar[0]->menu_cat == $items->id)
                                                    {{'selected'}}
                                                @endif
                                            @endif
                                        >
                                            {{$items->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Get</button>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.navBar-getNavBar')}}">
                                    <button type="button" class="btn btn-sm btn-outline-primary ml-2">Reset</button>
                                </a>
                            </div>
                        </form>
                        <a role="button"  class="btn btn-outline-primary btn-sm" href="{{route('admin.navBar-getAdd')}}">Add</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                             <tr role="row">
                                 <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-label="Office: activate to sort column ascending" style="width: 20px;">Order</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 120px;">Menu Name</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 120px;">Menu Category</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending" style="width: 100px;">Updated at</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending" style="width:50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($Nav_bar))
                                @foreach($Nav_bar as $row)
                             <tr role="row" class="odd">
                                 <td>{{$row->order}}</td>
                                <td>{{$row->menu_name}}</td>
                                <td>{{! empty($row->getMenuCategoryTable->name) ? $row->getMenuCategoryTable->name : ''}}</td>
                                <td>{{$row->updated_at}}</td>
                                <td class='d-flex flex-row'>
                                    <a role="button" class="btn btn-sm btn-outline-primary mr-1" href="{{route('admin.navBar-getEdit',['id'=>$row->id])}}">Edit</a>
                                    <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('admin.navBar-del',['id'=>$row->id])}}">Del</a>
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
                    @if(isset($Nav_bar) && $Nav_bar->count() > 10 )
                        {{$Nav_bar->links()}}
                    @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 