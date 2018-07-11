jQuery(document).ready(function($) {
    jQuery("body").addClass("td-js-loaded");

    $('#td-top-mobile-toggle, .td-mobile-close a').click(function(e) {
        e.preventDefault();
        document.ontouchmove = function(event){
            event.preventDefault();
        }
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").removeClass("td-menu-mob-open-menu") : jQuery("body").addClass("td-menu-mob-open-menu")
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden")
    });

    $('#td-header-search-button-mob, .td-search-close a').click(function(e) {
        e.preventDefault();
        document.ontouchmove = function(event){
            event.preventDefault();
        }
        jQuery("body").hasClass("td-search-opened") ? jQuery("body").removeClass("td-search-opened") : jQuery("body").addClass("td-search-opened")
        jQuery("body").hasClass("td-search-opened") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden")
    });
});
