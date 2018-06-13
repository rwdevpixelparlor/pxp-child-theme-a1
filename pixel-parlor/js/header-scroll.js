jQuery(document).ready(function($) {
  // [SCROLLING HEADER SCRIPTS]

  (function($) {
    var cover_section = "#cover-section",
      top_header = "#top-header, #et-secondary-nav",
      header = "#main-header";

    $(window).bind("scroll", function() {
      if ($(window).scrollTop() > 115) {
        $(header).addClass("opaque-header");

        $(header).removeClass("transparent-header");

        $(top_header).addClass("opaque-header");

        $(top_header).removeClass("transparent-header");
      } else {
        $(header).removeClass("opaque-header");

        $(header).addClass("transparent-header");

        $(top_header).removeClass("opaque-header");

        $(top_header).addClass("transparent-header");
      }
    });

    $(document).ready(function() {
      top_header = "#top-header, #et-secondary-nav";

      header = "#main-header";

      $(header).addClass("transparent-header");

      $(top_header).addClass("transparent-header");
      if ($(cover_section).length) $("body").addClass("cover-active");
    });

    $(window).load(function() {
      if ($(cover_section).length) set_viewport_height($(cover_section));
    });

    $(window).resize(function() {
      if ($(cover_section).length) set_viewport_height($(cover_section));
    });

    function set_viewport_height(element) {
      var viewport_height = $(window).height();
      if ($("#wpadminbar").length)
        var viewport_height = viewport_height - $("#wpadminbar").innerHeight();
      $(element).height(viewport_height);
    }
  })(jQuery);

  (function($) {
    $(window).load(function() {
      $("#divi-loading").fadeOut(800);
    });
  })(jQuery);
});
