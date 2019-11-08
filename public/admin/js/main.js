(function($) {
    "use strict"; // Start of use strict
    //
    $(document).ready(function(){
        //Custom select html tag in admin->edit function
        $('select.admin-select-edit').on('change',function(){
               $(this).find('option:selected').attr('selected',true).next().attr('selected',false);
        });

    });// End document event.

})(jQuery); // End of use strict
