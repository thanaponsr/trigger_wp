const voxpow_loader = jQuery('.voxpow__loader');
const voxpow_message = jQuery('.voxpow__message');
const voxpow_test_connection = jQuery('.voxpow__test__connection');

jQuery(function () {

    // check connection button
    voxpow_test_connection.on('click', function () {

        console.log('Testing connection to Voxpow API');

        const data = {
            voxpow_key: jQuery('input[name=voxpow_tracker_id]').val(),
            voxpow_secret: jQuery('input[name=voxpow_api_endpoint]').val(),
            action: 'voxpow_test_connection'
        };

        voxpow_loader.hide();

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            voxpow_message.show();
            voxpow_loader.hide();
            jQuery('html,body').animate({scrollTop: 0}, 1000);
        });

    });

});