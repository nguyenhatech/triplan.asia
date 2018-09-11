jQuery(document).ready(function($) {
    var $docEl = $('html, body'),
      $wrap = $('.content'),
      scrollTop;

    $('button').click(function(e) {
      // overlayOpen();
      // e.preventDefault();
    });

    $('.close').click(function(e) {
      overlayClose();
      e.preventDefault();
    });

    var overlayClose = function() {
      $.unlockBody();
      $('body').removeClass('overlay-open');
    }
    var overlayOpen = function() {
      $('body').addClass('overlay-open');
      $.lockBody();
    }

    $.lockBody = function() {
      if(window.pageYOffset) {
        scrollTop = window.pageYOffset;

        $wrap.css({
          top: - (scrollTop)
        });
      }

      $docEl.css({
        // height: "100%",
        // overflow: "hidden"
      });
    }

    $.unlockBody = function() {
      $docEl.css({
        height: "",
        overflow: ""
      });

      $wrap.css({
        top: ''
      });

      window.scrollTo(0, scrollTop);
      window.setTimeout(function () {
        scrollTop = null;
      }, 0);

    }


    jQuery("body").addClass("td-js-loaded");

    $('#td-top-mobile-toggle, .td-mobile-close a').click(function(e) {
        e.preventDefault();
        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").removeClass("td-menu-mob-open-menu") : jQuery("body").addClass("td-menu-mob-open-menu");

        jQuery("body").hasClass("td-menu-mob-open-menu") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden");
    });

    $('#td-header-search-button-mob, .td-search-close a').click(function(e) {
        e.preventDefault();
        jQuery("body").hasClass("td-search-opened") ? jQuery("body").removeClass("td-search-opened") : jQuery("body").addClass("td-search-opened");

        jQuery("body").hasClass("td-search-opened") ? $.lockBody() : $.unlockBody();

        jQuery("body").hasClass("td-search-opened") ? jQuery("body").addClass("overflow-hidden") : jQuery("body").removeClass("overflow-hidden");
    });
});
