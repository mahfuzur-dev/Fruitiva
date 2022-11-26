$(window).scroll(function () {
  var sticky = $(this).scrollTop();
  if (sticky > 300) {
    $("#header_area").addClass("sticki_menu");
  } else {
    $("#header_area").removeClass("sticki_menu");
  }
});
// sticky menu end


/// slick-slider

$(".slick_slider").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 800,
  prevArrow: false,
  nextArrow:false,
});
$(".slick_item").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 800,
    prevArrow: true,
    nextArrow: true,
});


//==== Back-to-top button
  $(window).on('scroll', function(event) {
    if($(this).scrollTop() > 600){
        $('.back-to-top').fadeIn(200)
    } else{
        $('.back-to-top').fadeOut(200)
    }
});
//==== Animate the scroll to top
$('.back-to-top').on('click', function(event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: 0,
    }, 1000);
});


var icon = document.getElementById("icon");
icon.onclick = function () {
    document.body.classList.toggle("dark-theme");
}

/// shop Details 
 $(".slider-for").slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   focusOnSelect: true,
   fade: true,
   asNavFor: ".slick_details",
 });

 $(".slick_details").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    vertical: true,
    verticalSwiping: true,
    asNavFor: ".slider-for",
    dots: false,
   arrows: false,
    speed:800,
   
 });
