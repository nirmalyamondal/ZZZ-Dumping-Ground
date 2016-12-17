(function ($) {
  'use strict';

  $.fn.responsive = function () {

    this.aspectRatio = this.width() / this.height();

    this.css({
      width : this.parent().width(),
      height : this.parent().width() / this.aspectRatio
    });

    var that = this;

    $(window).resize(function () {
      $(that.selector).css({
        width : $(that.selector).parent().width(),
        height : $(that.selector).parent().width() / that.aspectRatio
      });
    });

  }

})(jQuery);
