jQuery(document).ready(function($) {
    $("#backToTop").click(function () {
       $("html, body").animate({scrollTop: 0}, 400);
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            console.log('ngon');
            $('.header-top-navigation').addClass('header-top-navigation-scroll');
            $('.header-top-navigation .nav-link').css('color', '#000 !important');
            $('.header-top-navigation .navbar-brand span').css('color', '#000');
        } else {
            console.log('về như cũ');
            $('.header-top-navigation').removeClass('header-top-navigation-scroll');
            $('.header-top-navigation .navbar-brand span').css('color', '#fff');
        }
    });
});
