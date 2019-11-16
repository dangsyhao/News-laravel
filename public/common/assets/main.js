$(document).ready(function(){
    /**
     * Upload file
     */
    //AJAX Token Setup
    $.ajaxSetup({
        headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    //Get image upload box.
    function getImagesUploadBox(){

        $.ajax({
            url: "/upload/getbox",
            method: "GET",
            datatype: "text",
            cache: false,
            beforeSend:function(){
                $('button#call-images-upload-box').removeClass('file-uploaded');
            },
            success:function (result) {
                $('body').append(result,'<div id="over">');
                $('button#call-images-upload-box').addClass('file-uploaded');
                $('#get_images_box ,#over').fadeIn(1000);
                $('form#upload_file_form').find('button[type*="submit"]').css('display','inherit');
            }
        });

    }
    //
    $(document).on('click','button',function (event) {
        //Get Image option Box.
        if($(this).is('#call-images-upload-box')){
            getImagesUploadBox();
        }
        //
        if($(this).is('#btn-get-images-upload-url-items')){
            event.preventDefault();
            $(this).removeClass('btn-outline-danger selected').text('Seclect');
            $(this).addClass('btn-outline-danger selected').text('Selected');
            //
            var url_data = $(this).data('image-upload-url');
            $('img#img-img-ur-upload').attr({'src':url_data,'style':false});
            $('input#input-img-ur-upload').attr('value',url_data);
        }
        if($(this).is('#btn-close-img-upload')){
            //close image option box
                $('#over, .login').fadeOut(1000).remove();
        }

    });
    //upload function
    $(document).on('submit','form#upload_file_form',function (event) {
        event.preventDefault();
        var file_data = $('#input_file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //Load image manager box
        $.ajax({
            url: "/upload/upload",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#success').empty();
                $('.progress').css('display','inherit');
                $('.progress-bar').css('width', '30%');
            },
            success: function (result) {
                if(result.result === 'true'){
                    $('.progress-bar').text('Uploaded').css('width', '100%');
                    //
                    setTimeout(function () {
                        getImagesUploadBox();
                        $('.progress').css('display','none');

                    },1200);

                    //Reload file items after upload
                    if($('div.table-responsive').is('#Is-Files-Manager-page'))
                    {
                        loadFilesManagerPage();
                    }
                }
                if(result.errors){
                    $('.progress').css('background-color','red');
                    $('.progress-bar').css({'width':'100%','background-color':'inherit'}).text('File Errors !');
                    //
                    setTimeout(function () {
                        getImagesUploadBox();
                        $('.progress').css('display','none');

                    },1200);
                }
                //

            },
        });
    });

    /**
     * Files Manager.
     */
    //Get image upload box.
    function loadFilesManagerPage(){
        $.ajax({
            url: "/files/get.ajax",
            method: "GET",
            datatype: "xml",
            cache: false,
            beforeSend:function(){
                //
            },
            success:function (result) {
                $('#load-files-items-by-ajax').html(result);
            }
        });
    }
    //Delete items by ID
    function deleteItemById(id){
        var _token = $('[name*="csrf-token"]').attr('content');
        $.ajax({
            url: "/files/delete",
            method: "POST",
            data:{
                id:id
            },
            datatype:'json',
            cache: false,
            beforeSend:function(){
                //
            },
            success:function (result) {
                if (result.result === 'success'){
                    loadFilesManagerPage();

                }else{
                    alert('fail');
                }

            }
        });
    }
    //
    $(document).on('click','button,a',function () {
        if($('div.table-responsive').is('#Is-Files-Manager-page'))
        {
            if($(this).is('.delete-file-items')){
                var id = $(this).parent().data('img-id');
                deleteItemById(id);
            }

        }

    });



});
