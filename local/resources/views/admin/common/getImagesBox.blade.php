<div class="login" id="get_images_box">
    <div class="container">
            <div class='row images-box-head'>
                <div class='text col-md-10'>
                    <h3 class="title">Images Upload Items</h3>
                </div>
                <div class="col-md-2 btn btn-close-upload">
                    <button id="btn-close-img-upload" class="btn btn-sm btn-outline-danger">close</button>
                </div>
            </div>
            </div>
            <div class="col-md-12 image-box-content">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                    <tr role="row">
                        <th class=" col-md-7 col-sm-7 " tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending">Image items
                        </th>
                        <th class="col-md-5 col-sm-5 " tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending" >Select
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($image_name))
                        @foreach($image_name as $key=>$value)
                            <tr role="row" class="odd">
                                <td>
                                    <div class="image-upload-item">
                                        <img src="{{url('local/storage/app')}}/{{$value}}" alt="Smiley face">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" id="btn-get-images-upload-url-items" class="btn btn-sm btn-outline-primary btn-get-images-upload-url-items" data-image-upload-url="{{$value}}" >Select</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>`
    </div>
</div><!--./End Show Images Box.!-->