$(document).ready(function(){
    //Get Image option Box.
    $('button').each(function () {
        //show image option box
        if($(this).is('#btn-get-image-upload')){
            $(this).click(function() {
                $('#get_images_box').fadeIn();
                // thêm phần tử id="over" vào sau body
                $('body').append('<div id="over">');
                $('#over').fadeIn();
            });
        }
        //close image option box
        if($(this).is('#btn-close-img-upload')){
            $(this).click(function () {
                $('#over, .login').fadeOut();
                $('#over').remove();
            });
        }
        //
        if($(this).is('#btn-get-images-upload-url-items')){
            $(this).click(function (event) {
                event.preventDefault();
                $('button#btn-get-images-upload-url-items').removeClass('btn-outline-danger selected').text('Seclect');
                $(this).addClass('btn-outline-danger selected').text('Selected');
                //
                var url_data = $(this).data('image-upload-url');
                $('img#img-img-ur-upload').attr('src',window.location.origin+'/local/storage/app/'+url_data).attr('style',false);;
                $('input#input-img-ur-upload').attr('value',window.location.origin+'/local/storage/app/'+url_data);

            })
        }
    });

    /*get Process bar into download function*/
    $('form').ajaxForm({
        beforeSend:function(){
            $('#success').empty();
        },
        uploadProgress:function(event, position, total, percentComplete)
        {
            $('.progress-bar').text(percentComplete + '%');
            $('.progress-bar').css('width', percentComplete + '%');
        },
        success:function(data)
        {
            if(data.errors)
            {
                $('.progress-bar').text('0%');
                $('.progress-bar').css('width', '0%');
                $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
            }
            if(data.success)
            {
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width', '100%');
                $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                $('#success').append(data.image);
            }
        }
    });

});
