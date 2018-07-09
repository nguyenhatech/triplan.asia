jQuery(document).ready(function($) {
    $("#backToTop").click(function () {
       $("html, body").animate({scrollTop: 0}, 400);
    });

    $('.navi-action__search i').click(function(event) {
        $('.navi-action__search .home-form-search').toggle(400);
    });
});
