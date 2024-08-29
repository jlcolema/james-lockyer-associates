(function($) {
  $(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    slideshow: false,
    controlNav: false,
    animationLoop: false,
    itemWidth: 150,
    prevText: "&lt;",
    nextText: "&gt;",
  start: function(slider){
    $('body').removeClass('loading');
}
});
});
})(jQuery);