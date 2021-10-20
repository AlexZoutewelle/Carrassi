document.addEventListener('DOMContentLoaded', function(e){
    jQuery('.contact_form form').submit(function(e){
        e.preventDefault();

        jQuery('.contact_form form button .button_text').hide();
        jQuery('.contact_form form button .spinner').show();

        let form_data = {};
        jQuery('.contact_form form').serializeArray().map(function(item) {
            if ( form_data[item.name] ) {
                if ( typeof(form_data[item.name]) === "string" ) {
                    form_data[item.name] = [form_data[item.name]];
                }
                form_data[item.name].push(item.value);
            } else {
                form_data[item.name] = item.value;
            }
        });

        let data = {
            'action' : 'contact_form',
            'form' : form_data
        }

        jQuery.ajax({
            url: carrassi_config.ajax_url,
            type: 'POST',
            dataType:'json',
            cache: false,
            data: data,
            success: function(response) {
                jQuery('.contact_form form button .button_text').show();
                jQuery('.contact_form form button .spinner').hide();

                alert(response.data.message);


            },
            error: function(reponse) {
                alert(response.data.message);
            }
        });

    });
});

