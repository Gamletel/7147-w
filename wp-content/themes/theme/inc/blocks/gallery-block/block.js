jQuery(document).ready(function($){

    const gallerySwiper = new Swiper('#gallery-block .swiper',{
        slidesPerView: 1,
        // spaceBetween: 30,
        navigation:{
            prevEl: '#gallery-block .swiper-btn-prev',
            nextEl: '#gallery-block .swiper-btn-next',
        },
        pagination:{
            el: '#gallery-block .swiper-pagination',
        },
        breakpoints:{
            320:{
                spaceBetween: 10,
            },
            576:{
                spaceBetween: 15,
            },
            992:{
                spaceBetween: 30,
            },
        }
    })

});