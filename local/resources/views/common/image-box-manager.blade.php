<div class="login get-image-upload-box" id="get_images_box">
    <div class="container">
            <div class='row images-box-head'>
                <div class='text col-md-10'>
                    <h3 class="title">Images Upload Items</h3>
                </div>
                <div class="col-md-2 btn btn-close-upload">
                    <button id="btn-close-img-upload" class="btn btn-sm btn-outline-danger">close</button>
                </div>
            </div>
            <div class="uploads-form">
                <form role="form" enctype="multipart/form-data" id="upload_file_form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <input id="input_file" type="file" name="file" />
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Upload</button>
                        </div>
                    </div>
                </form>
                <div class="progress" style="display: none">
                    <div class="progress-bar" role="progressbar" aria-valuenow=""aria-valuemin="0" aria-valuemax="100" style="width: 0%">
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
                    @if(isset($Files))
                        @foreach($Files as $rowItems)
                            <tr role="row" class="odd">
                                @foreach($rowItems as $items)
                                <td>
                                    <div class="image-upload-item">
                                        <img src="{{$items['file_url']}}" alt="Smiley face">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" id="btn-get-images-upload-url-items" class="btn btn-sm btn-outline-primary btn-get-images-upload-url-items" data-image-upload-url="{{$items['file_url']}}" >Select</button>
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>`
    </div>

</div><!--./End Show Images Box.!-->