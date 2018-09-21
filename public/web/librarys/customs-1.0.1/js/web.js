jQuery(document).ready(function($) {
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

    $('.header-top-navigation').addClass('header-top-navigation-scroll');
    $('.navbar-light .navbar-nav .nav-link').addClass('nav-link-scroll');
    $('#logo_white').hide();
    $('#logo_blue').show();
});
