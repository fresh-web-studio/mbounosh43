$(document).ready(function(){
    $("#owl-carousel1").owlCarousel(
        {
            loop:true,
            items: 1,
            nav:true,
            navText: ['&#xf053;','&#xf054;'],
            autoplay:true,
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    dots:false
                },
                415:{

                }
            }
        }
    )
})