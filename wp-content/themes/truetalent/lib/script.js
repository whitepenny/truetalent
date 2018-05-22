var menuRight = document.getElementById( 'site-navigation' ),
    showRight = document.getElementById( 'showRight' ),
    body = document.body;
showRight.onclick = function() {
    this.classList.toggle('active');
    menuRight.classList.toggle('cbp-spmenu-open');
    disableOther( 'showRight' );
};

function disableOther( button ) {
    if( button !== 'showRight' ) {
        this.classList.toggle('disabled');
    }
}

jQuery( document ).ready(function( $ ) {
  

  $('.bio-target').click(function(e) {
    var $target = $(this).data('target');
    $('.overlay__bio').removeClass('active');
    $('.overlay__bio[data-target="' + $target + '"]').addClass('active');
    e.preventDefault();
  });

  $('.bio-target-close').click(function(e){
    $(this).parent().removeClass('active');
  });

  $('.featured-events').slick();

  $('.member').on('click', function () {
   $(this).find('.member-details').toggleClass('active');
  });

  $('.home-slider').slick({
    'dots': true,
    'prevArrow': '.home-slider-prev',
    'nextArrow': '.home-slider-next',
    'appendDots': '.home-slider-dots',
    'autoplay': true,
    'autoplaySpeed': 6000
  });



  /* Search Bar
  -----------------------------------------*/

  
    $(".search-trigger").addClass('grey_button close');
    $('.grey_button.close').click(function() {
      //$('.grey_button.open').click();
      $('#true-search-bar').slideToggle();
      //$(this).toggleClass('close open');
      return false;
    });
    $('.grey_button.open').click(function() {
      //$('.grey_button.close').click();
      $('#true-search-bar').hide();
      //$(this).toggleClass('close open');
      return false;
    });

    var iframe = document.querySelector('.modal iframe');
        var player = new Vimeo.Player(iframe);

  $('.modal-open').click(function(e) {
    $('.modal').addClass('open');
    player.play();
    e.preventDefault();
  });

  $('.modal-close').click(function(e) {
    $(".modal iframe").attr("src", $(".modal iframe").attr("src"));
    $('.modal').removeClass('open');
  })
  

});