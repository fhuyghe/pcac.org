export default {
  init() {
    // JavaScript to be fired on all pages

    //Open de mega menu
    $('.menu-item.councils').on('mouseenter', function () {
      $('.nav-councils').addClass('active');
    })
    
    $('.nav-councils').on('mouseleave', function () {
      $(this).removeClass('active');
    })

    // Small Menu when scrolled
    let banner = $('.banner');
    $(window).on('scroll', function () {
      if ($(window).scrollTop() > 100) {
        banner.addClass('scrolled');
      } else {
        banner.removeClass('scrolled');
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
