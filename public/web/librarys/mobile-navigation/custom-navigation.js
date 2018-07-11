function mobile_menu_toogle() {
    $('#td-top-mobile-toggle, .td-mobile-close a').click(function() {
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").removeClass("td-menu-mob-open-menu") : jQuery("body").addClass("td-menu-mob-open-menu")
    });
}

jQuery(document).ready(function($) {
    jQuery("body").addClass("td-js-loaded");

    mobile_menu_toogle();

    jQuery("#td-header-search-button-mob").click(function(a) {
        jQuery("body").addClass("td-search-opened");
        var b = jQuery("#td-header-search-mob");
        setTimeout(function() {
            b.focus()
        }, 1300);
    });

    jQuery(".td-search-close a").click(function() {
        jQuery("body").removeClass("td-search-opened")
    })
});