@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Image Editor</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Quản lý ảnh</div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                <div class="row ">
                    <div class="col-sm-12 col-md-12">
                    <form method="POST" action="{{route('admin.photos-upload')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                        <input type="file" id="myFile" name="imageFile" class="form-control-file">
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-outline-primary" onclick="uploads()">Upload</button>
                        </div>

                    </form>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" 
                                            aria-label="Name: activate to sort column descending" style="width: 5px;">ID</th>
                            
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" style="width: 100px;">Image Names
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                                            aria-label="Position: activate to sort column ascending" style="width: 50px;">Actions
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($image_name))
                                    @foreach($image_name as $key=>$value)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">1</td>
                                    
                                    <td><img src="{{asset('local/storage/app/')}}/{{$value}}" alt="Smiley face" height="90px" width="125px"></td>
                                    <td class='d-flex flex-row'>
                                        
                                        <input type='text' class='form-control mr-2' name='image_path' value="{{asset('local/storage/app')}}/{{$value}}" id="{{$value}}">

                                        <button class="btn btn-md btn-outline-danger mr-1" onclick="myFunction('{{$value}}')">Copy Clipboard</button> 
                                      
                                        <form action="{{route('admin.photos-del')}}" method='get'>
                                            <input type='hidden' name='image_path' value="{{$value}}">
                                            <button type='submit' class="btn btn-md btn-outline-primary" >Del</button>
                                        </form>

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
                            @if(isset($date_date))
                                {{$date_date->links()}}
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

<!--Javascript And JQủey!-->

            <script>
    /* -------Copy Clipboard Function----- */

                function myFunction(id_value) {
                var copyText = document.getElementById(id_value);
                copyText.select();
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
                }
            </script>
                
            <script>   
    /* -------Alert Aploads Function----- */
                function uploads(){alert("Đã Upload !")}


            </script>

@endsection 