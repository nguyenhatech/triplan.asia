jQuery(document).ready(function($) {
    jQuery("body").addClass("td-js-loaded");

    $('#td-top-mobile-toggle, .td-mobile-close a').click(function(e) {
        e.preventDefault();
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").removeClass("td-menu-mob-open-menu") : jQuery("body").addClass("td-menu-mob-open-menu")
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden")
    });

    $('#td-header-search-button-mob, .td-search-close a').click(function(e) {
        e.preventDefault();
        if (jQuery("body").hasClass("td-search-opened")) {
            document.ontouchmove = function(e){ return true; }
            jQuery("body").removeClass("td-search-opened")
        } else {
            document.ontouchmove = function(event){
                event.preventDefault();
            }
            jQuery("body").addClass("td-search-opened")
        }
        jQuery("body").hasClass("td-search-opened") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden")
    });
});
