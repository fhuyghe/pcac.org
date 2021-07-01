export default {
  init() {
    // JavaScript to be fired on the about us page

    $('.question header').on('click', function (e) {
      let question = $(e.target).closest('.question');
      
      if (question.hasClass('active')) {
        question.removeClass('active') 
      } else {
        $('.question').removeClass('active') 
        question.addClass('active') 
      }
    });
  },
};
