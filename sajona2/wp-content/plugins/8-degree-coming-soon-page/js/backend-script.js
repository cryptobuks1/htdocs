jQuery(document).ready(function ($) {
    jQuery('.cpa-color-picker').wpColorPicker();
    jQuery('.cpa-color-picker2').wpColorPicker();



    /*pre display of fields*/
    (function ($) {

        if ($('.enable').is(":checked")) {
            $('.general-common-section').show();
        }

        if ($('#display-1').is(":checked")) {
            $('#field-1').show();
        }
        if ($('#display-2').is(":checked")) {
            $('#field-2').show();
        }
        if ($('#display-3').is(":checked")) {
            $('#field-3').show();
        }
        if ($('#display-4').is(":checked")) {
            $('#field-4').show();
        }
        if ($('#display-5').is(":checked")) {
            $('#field-5').show();
        }
        if ($('#display-6').is(":checked")) {
            $('#field-6').show();
        }

        //DESIGN OPTIONS
        if ($('#option_colorbg').is(":checked")) {
            $('.bg-color-type').show();
        }
        if ($('#option_imagebg').is(":checked")) {
            $('.background-image').show();
        }
        if ($('#pre_img').is(":selected")) {
            $('.bg-available-type').show();
        }
        if ($('#new_img').is(":selected")) {
            $('.bg-img-type').show();
        }

        if ($('#bg_img1').is(":selected")) {
            $('.image-preview-1').show();
        }
        if ($('#bg_img2').is(":selected")) {
            $('.image-preview-2').show();
        }
        if ($('#bg_img3').is(":selected")) {
            $('.image-preview-3').show();
        }
        if ($('#bg_img4').is(":selected")) {
            $('.image-preview-4').show();
        }
        if ($('#bg_img5').is(":selected")) {
            $('.image-preview-5').show();
        }
        if ($('#bg_img6').is(":selected")) {
            $('.image-preview-6').show();
        }
        if ($('#bg_img7').is(":selected")) {
            $('.image-preview-7').show();
        }
        if ($('#bg_img8').is(":selected")) {
            $('.image-preview-8').show();
        }
        if ($('#bg_img9').is(":selected")) {
            $('.image-preview-9').show();
        }
        if ($('#bg_img10').is(":selected")) {
            $('.image-preview-10').show();
        }
        if ($('#bg_img11').is(":selected")) {
            $('.image-preview-11').show();
        }
        if ($('#bg_img12').is(":selected")) {
            $('.image-preview-12').show();
        }

        /* if($('#layout1-trigger').is(":checked")){
         $('.timer-layout1-preview').show();
         } */

        //Extra Options



    })(jQuery);



    /*pre display of fields ends*/


    $('.menu-click').click(function () {
        $('.menu-click').removeClass('edmm-menu-active');
        $(this).addClass('edmm-menu-active');
        var menu_id = $(this).attr('id');
        if (menu_id == 'general-menu') {
            $('.settings-content').hide();
            $('.general-settings-wrap').show();
            // $('.background-settings-wrap').show();
        }
        if (menu_id == 'design-menu') {
            $('.settings-content').hide();
            $('.design-wrap').show();
        }
        if (menu_id == 'subscribers-menu') {
            $('.settings-content').hide();
            $('.subscribers-settings-wrap').show();
            $('.backend-submit-buttons').hide();
        } else {
            $('.backend-submit-buttons').show();
        }
        if (menu_id == 'extras-menu') {
            $('.settings-content').hide();
            $('.extra-wrap').show();
        }
        if (menu_id == 'how-to-use') {
            $('.settings-content').hide();
            $('.documentation-wrap').show();
            $('.backend-submit-buttons').hide();
        }
        if (menu_id == 'about-panel') {
            $('.settings-content').hide();
            $('.about-content-wrap').show();
            $('.backend-submit-buttons').hide();
        }

    });

    //Show/hide fields

    $('.status-mode').change(function () {
        if ($(this).val() == '1') {
            $('.general-common-section').show();
        } else {
            $('.general-common-section').hide();
        }
        /* if ($('.enable').is(":checked")) {
         $('.general-common-section').show();
         
         }
         if ($('.disable').is(":checked")) {
         $('.general-common-section').hide();
         
         } */


    });

    /*Number validation*/
    $('.save-option').click(function () {
        var date_val = $('.custom_date').val();
        var hour_val = $('#input-hour').val();
        var min_val = $('#input-minute').val();
        var second_val = $('#input-second').val();



        if (isNaN(hour_val))
        {
            $('.error-number').html('Please enter hour in number .');
            $('#input-hour').focus();
            return false;

        } else {
            //return true; 
        }
        if (isNaN(min_val))
        {
            $('.error-number').html('Please enter minute in number.');

            $('#input-minute').focus();
            return false;

        }
        else {
            //return true;   
        }
        if (isNaN(second_val))
        {
            $('.error-number').html('Please enter second in number.');
            $('#input-second').focus();
            return false;

        }
        else {
            // return true;  
        }
    });



    $('.field-display-trigger').change(function () {

        var id_field = $(this).attr('id');
        var split_num = id_field.split('-');
        var num = split_num[1];

        if ($(this).prop('checked')) {
            $('#field-' + num).show();
        }
        else {
            $('#field-' + num).hide();
        }
    });

    // Sort social icons
    $('.sortable').sortable({containment: "parent"});


    // end ready function

    /*$('.bg-select-class').change(function(){
     if($('.bg-select-class').val() == 'color'){
     $('.bg-common-class').hide();
     $('.bg-color-type').show();
     }
     if($('.bg-select-class').val() == 'available'){
     $('.bg-common-class').hide();
     $('.bg-available-type').show();
     }
     
     if($('.bg-select-class').val() == 'image'){
     $('.bg-common-class').hide();
     $('.bg-img-type').show();
     }
     if($('.bg-select-class').val() == '0'){
     $('.bg-common-class').hide();
     } 
     }); */

    $('.background-image-type').change(function () {
        if ($(this).val() == 'color') {
            $('.bg-common-class').hide();
            $('.bg-color-type').show();
            $('.image-bg-common').hide();
            //$('.bg-img-type').hide();
        }
        if ($(this).val() == 'image') {
            $('.bg-common-class').hide();
            $('.background-image').show();

            var img = $('.bg-image-choose').val();
            if (img == 'pre') {
                $('.bg-available-type').show();
            }
            if (img == 'new') {
                $('.bg-img-type').show();
            }
        }
    });
    //Show hide pre-available/new image bg

    $('.bg-image-choose').change(function () {
        if ($(this).val() == 'pre') {
            $('.image-bg-common').hide();
            $('.bg-available-type').show();
        }
        if ($(this).val() == 'new') {
            $('.image-bg-common').hide();
            $('.bg-img-type').show();
        }
    });



    //Pre available image hide/show
    $('.bg-select-class').change(function () {
        if ($(this).val() == 'image0') {
            $('.bg-img-preview').hide();

        }
        if ($(this).val() == 'image1') {
            $('.bg-img-preview').hide();
            $('.image-preview-1').show();
        }
        if ($(this).val() == 'image2') {
            $('.bg-img-preview').hide();
            $('.image-preview-2').show();
        }
        if ($(this).val() == 'image3') {
            $('.bg-img-preview').hide();
            $('.image-preview-3').show();
        }
        if ($(this).val() == 'image4') {
            $('.bg-img-preview').hide();
            $('.image-preview-4').show();
        }
        if ($(this).val() == 'image5') {
            $('.bg-img-preview').hide();
            $('.image-preview-5').show();
        }
        if ($(this).val() == 'image6') {
            $('.bg-img-preview').hide();
            $('.image-preview-6').show();
        }
        if ($(this).val() == 'image7') {
            $('.bg-img-preview').hide();
            $('.image-preview-7').show();
        }
        if ($(this).val() == 'image8') {
            $('.bg-img-preview').hide();
            $('.image-preview-8').show();
        }
        if ($(this).val() == 'image9') {
            $('.bg-img-preview').hide();
            $('.image-preview-9').show();
        }
        if ($(this).val() == 'image10') {
            $('.bg-img-preview').hide();
            $('.image-preview-10').show();
        }
        if ($(this).val() == 'image11') {
            $('.bg-img-preview').hide();
            $('.image-preview-11').show();
        }
        if ($(this).val() == 'image12') {
            $('.bg-img-preview').hide();
            $('.image-preview-12').show();
        }
    });

    /* $('.timer_layout').change(function(){
     if($(this).val() == 'layout1'){
     
     $('.timer-common-layout').hide();
     $('.timer-layout1-preview').show();
     } 
     }); */


    $('#checkall').change(function () {
        if ($(this).prop('checked')) {
            $(".select_subs").prop("checked", true);
        }
        else {
            $(".select_subs").prop("checked", false);
        }
    });


    //DATE PICKER SCRIPT
    $('.custom_date').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    var custom_uploader;


    /*$('#upload_image_button').click(function (e) {

        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            console.log(custom_uploader.state().get('selection').toJSON());
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#upload_image').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

    }); */
    jQuery("input[class^='edm_upload_image']").click(function(e) {
        e.preventDefault();
        row_id = jQuery(this).prev().attr('id');
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Quote',
            button: {
                text: 'Choose Quote'
            },
            multiple: false
        });
        
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#' + row_id).val(attachment.url);
        });
        
        //Open the uploader dialog
        custom_uploader.open();
    });

    var myOptions = {
        // you can declare a default color here,
        // or in the data-default-color attribute on the input
        defaultColor: false,
        // a callback to fire whenever the color changes to a valid color
        change: function (event, ui) {
        },
        // a callback to fire when the input is emptied or an invalid color
        clear: function () {
        },
        // hide the color picker controls on load
        hide: true,
        // show a group of common colors beneath the square
        // or, supply an array of colors to customize further
        palettes: true
    };

    jQuery('#headline_color,#description_color').wpColorPicker(myOptions);

});

