jQuery(window).load(function () {
    jQuery("#select_products_bundle").select2();

    jQuery("#select_products_bundle").on("select2:select", function (event) {
        var element = event.params.data.element;
        var $element = jQuery(element);

        $element.detach();
        jQuery(this).append($element);
        jQuery(this).trigger("change");
    });
});
