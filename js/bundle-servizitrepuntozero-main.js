jQuery(window).load(function () {
    jQuery('form[name="add_to_cart_selected_products_bundle"]').submit(function (e) {
        e.preventDefault();

        var btn = jQuery(this).find('button[name="add_to_cart_bundle"]');
        var ids = btn.attr('data-prod-id');
        var discount = btn.attr('data-discount');
        var discount_chk = btn.attr('data-check');

        jQuery.ajax({
            url: ajax_object.ajax_url,
            method: 'POST',
            data: ({
                action: 'spb_ajax_add_to_cart_bundle',
                ids: ids,
                discount: discount,
                discount_chk: discount_chk,
            }),

            success: function (response) {
                console.log(ids);
                console.log(discount);
                console.log(discount_chk);
                console.log(response);
            },

            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Errore nell'invio dei dati!");
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
        });
        setTimeout(function(){
            location.reload();
        }, 200);
    });
});
