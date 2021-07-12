/*global ajaxloadmore */

export default {
  init() {
    // JavaScript to be fired on the home page
    $('.filter select').on('change', function (e) {
      var transition = 'fade';
      var speed = 250;
      var data = e.target.options[e.target.selectedIndex].dataset;
      console.log(data);
      
      ajaxloadmore.filter(transition, speed, data);
    })
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
