jQuery(document).ready(function($) {
    $("#backToTop").click(function () {
       $("html, body").animate({scrollTop: 0}, 400);
    });

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 200) {
            jQuery('.header-top-navigation').addClass('bg-white');
            $('.header-top-navigation .navbar-brand span').css('color', '#000');
        } else {
            jQuery('.header-top-navigation').removeClass('bg-white');
            $('.header-top-navigation .navbar-brand span').css('color', '#fff');
        }
    });
});
