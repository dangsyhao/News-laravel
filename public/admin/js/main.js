(function($) {
    "use strict";
    $(document).ready(function(){
    /**
     * Page::admin
     */

       /***-form.form-horizontal***/
       //custom value in add menus
        var menu_type = $('form.form-horizontal #field_get_menu_type_select_tag');
        var link_val = menu_type.find('option:selected').val();
        $('#field_'+link_val).css('display','inherit').find('input').attr({'required':true,'disabled':false});
        menu_type.change(function(){
            var selector = $('#field_'+$(this).val());
            selector.parent().children().css('display','none').parent().find('#field_'+$(this).val()).css('display','inherit');
            selector.parent().find('select,input').attr({'required':false,'disabled':true});
            selector.find('select,input').attr({'required':true,'disabled':false});
        });

    });// End_document

})(jQuery);
