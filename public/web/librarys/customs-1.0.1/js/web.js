jQuery(document).ready(function($) {
    $("#backToTop").click(function () {
       $("html, body").animate({scrollTop: 0}, 400);
    });
});
