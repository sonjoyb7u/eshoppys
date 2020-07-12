$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
  $('.owl-prev').html('<i class="fas fa-chevron-circle-left fa-2x"></i>')
  $('.owl-next').html('<i class="fas fa-chevron-circle-right fa-2x"></i>')
});