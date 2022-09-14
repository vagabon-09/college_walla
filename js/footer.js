$(window).scroll(function() {
    if ($(this).scrollTop() - 200 > 0) {
        $('.top-btn').stop().slideDown('fast'); 
    } else {
        $('.top-btn').stop().slideUp(0); 
    }
});


$(".top-btn").on("click", function () {
    $("html, body").animate({
        scrollTop: 0
    }, 200);
});



//slideing profile card 
$('.profile').owlCarousel({
    loop:true,
  stagePadding: 15,
    margin:10,
    nav:false,
    autoplay:true,
    dragEndSpeed:true,
    animateIn:true,
    animateOut:true,
    autoplaySpeed:2000,
//   navText : ['<span class="uk-margin-small-right uk-icon" uk-icon="icon: chevron-left"></span>','<span class="uk-margin-small-left uk-icon" uk-icon="icon: chevron-right"></span>'],
    responsive:{
        0:{
            items:1
        },
        640:{
            items:1
        },
      960:{
            items:2
        },
        1200:{
            items:3
        }
    }
})