(function($) {
  "use strict";

    function beopenLove(postId) {
        if (postId != '') {    

            jQuery.post(
                beopenAjax.ajaxurl,
                {
                    'action':'add_beopen_love',
                    'id': postId
                },
                function(response){
                    jQuery('.likes .counter').html(response);
                    jQuery('.likes .beopen-love a').fadeOut(400);
                }
                );


        }
    }
    
    $(function() {

        $('.beopen-love a').click(function () {
            beopenLove($(this).data('post-id'));
        })
    
    });

})(jQuery);