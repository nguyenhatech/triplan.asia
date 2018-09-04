jQuery(document).ready(function($) {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.header-top-navigation').addClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').addClass('nav-link-scroll');
            $('#logo_white').hide();
            $('#logo_blue').show();
        } else {
            $('.header-top-navigation').removeClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').removeClass('nav-link-scroll');
            $('#logo_blue').hide();
            $('#logo_white').show();
        }
    });

    // Phần chọn thay đổi ngôn ngữ chỗ footer chân trang:
    $('#language-system').on('change', function() {
        window.location.href = this.value;
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});
