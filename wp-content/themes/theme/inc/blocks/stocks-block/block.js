jQuery(document).ready(function($){

    const stocksSwiper = new Swiper('#stocks-block .swiper',{
        navigation:{
            prevEl: '#stocks-block .swiper-btn-prev',
            nextEl: '#stocks-block .swiper-btn-next',
        },
        pagination:{
            el: '#stocks-block .swiper-pagination',
        },
        breakpoints:{
            320:{
                slidesPerView: 1,
                spaceBetween: 15,
            },
            769:{
                slidesPerView: 1,
                spaceBetween: 15,
            },
            992:{
                slidesPerView: 2,
                spaceBetween: 30,
            },
        }
    })

});