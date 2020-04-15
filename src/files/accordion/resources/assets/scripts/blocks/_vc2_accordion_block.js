(function ($) {
  'use strict';
  $(document).ready(function () {
    $('.vc-accordion .accordion-menu').first().children('.accordion-wrap').addClass('show');
    $('.vc-accordion .accordion-menu').first().find('i.fa').css('transform', 'rotate(-90deg)');
    $('.vc-accordion .accordion-menu span.heading').on('click', function (e) {
      e.preventDefault();

      if ($(this).next().hasClass('show')) {
        $(this).next().removeClass('show').hide().animate({ opacity: "0" }, 200);
        $(this).children('i.fa').css('transform', 'rotate(0deg)');
      }
      else {
        $(this).next().addClass('show').show().animate({ opacity: "1" }, 200);
        $(this).children('i.fa').css('transform', 'rotate(-90deg)');
      }
    });
  });
})(jQuery);
