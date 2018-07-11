jQuery(document).ready(function($) {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.header-top-navigation').addClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').addClass('nav-link-scroll');
            $('.header-top-navigation .navbar-brand span').css('color', '#000');
            $('#logo_white').hide();
            $('#logo_blue').show();
        } else {
            $('.header-top-navigation').removeClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').removeClass('nav-link-scroll');
            $('.header-top-navigation .navbar-brand span').css('color', '#fff');
            $('#logo_blue').hide();
            $('#logo_white').show();
        }
    });
});
