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
            method: "POST",
            datatype: "xml",
            success:function (result) {
                $('body').append(result,'<div id="over">');
                $('#get_images_box ,#over').fadeIn(1000);
                $('form#upload_file_form').find('button[type*="submit"]').css('display','inherit');
            }
        });
    }
    //Get Image option Box.
        $('button#call-images-upload-box').click(function() {
            getImagesUploadBox();
        });
    //
    $(document).on('click','button',function (event) {
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

});
