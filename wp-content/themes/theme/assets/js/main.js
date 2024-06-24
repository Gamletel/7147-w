// Изменение количества товаров в корзине
var tct = null;

function cChangeValue(id, m) {
    var i = jQuery('#input-' + id);
    var cv = i.val();
    if (m === 1) {
        console.log(123)
        cv--;
        i.val(cv);
    }
    if (m === 0) {
        console.log(123)
        cv++;
        i.val(cv);
    }
    if (tct) {
        var q = tct;
        clearTimeout(q);
    }

    tct = setTimeout(function () {
        console.log(456)
        i.trigger('change');
        clearTimeout(tct);
    }, 300);
}

jQuery(document).ready(function($){
    console.log('test');
    // $( 'body' ).on( 'change', '.qty', function() { // поле с количеством имеет класс .qty
    //     console.log('asdf');
    //     $( '[name="update_cart"]' ).trigger( 'click' );
    // } );

    const maxFileSizeInMB = 1;
    const maxFileSizeInKB = 1024 * 1024 * maxFileSizeInMB;
    $(".form__file input[type=file]").on("change", function () {
        let file = this.files[0];
        if (file.size > maxFileSizeInKB) {
            alert("Вы загрузили изображение большого размера!");
            $(this).val("");
            return 0;
        }
        if (file) {
            $(this).closest(".form__file").find(".file__title").html(file.name);
        } else {
            $(this)
                .closest(".form__file")
                .find(".file__title")
                .html("+ Прикрепить файл");
        }
    });

    function addCartClick() {
        jQuery(document).on("added_to_cart", function () {
            makeNotice("add");
        });
        jQuery(document).on("removed_from_cart", function () {
            makeNotice("remove");
        });
    }

    addCartClick();

    function makeNotice(action) {
        let notice = document.querySelector(".notice");

        switch (action) {
            case "add":
                notice.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="send-ok__svg" viewBox="-105 197 400 400"><g><path id="Path-0" class="st0" d="M95 570.8c-95.8 0-173.8-78-173.8-173.8 0-95.8 77.9-173.8 173.8-173.8s173.8 78 173.8 173.8c0 95.8-78 173.8-173.8 173.8zM95 197c-110.3 0-200 89.7-200 200s89.7 200 200 200 200-89.7 200-200-89.7-200-200-200z"></path><g><path id="Path-1" class="st0" d="M167.4 331.5L64.3 434.6 22.6 393c-5.1-5.1-13.4-5.1-18.5 0s-5.1 13.4 0 18.5l51 51c2.6 2.6 5.9 3.8 9.3 3.8s6.7-1.3 9.3-3.8L186 350.1c5.1-5.1 5.1-13.4 0-18.5-5.2-5.2-13.5-5.2-18.6-.1z"></path></g></g></svg>
            <p class="notice-text">Товар успешно добавлен в корзину</p>`;
                break;
            case "remove":
                notice.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="send-ok__svg" viewBox="-105 197 400 400"><g><path id="Path-0" class="st0" d="M95 570.8c-95.8 0-173.8-78-173.8-173.8 0-95.8 77.9-173.8 173.8-173.8s173.8 78 173.8 173.8c0 95.8-78 173.8-173.8 173.8zM95 197c-110.3 0-200 89.7-200 200s89.7 200 200 200 200-89.7 200-200-89.7-200-200-200z"></path><g><path id="Path-1" class="st0" d="M167.4 331.5L64.3 434.6 22.6 393c-5.1-5.1-13.4-5.1-18.5 0s-5.1 13.4 0 18.5l51 51c2.6 2.6 5.9 3.8 9.3 3.8s6.7-1.3 9.3-3.8L186 350.1c5.1-5.1 5.1-13.4 0-18.5-5.2-5.2-13.5-5.2-18.6-.1z"></path></g></g></svg>
            <p class="notice-text">Товар удален из корзины</p>`;
                break;
            case "favoriteAdd":
                notice.innerHTML = `<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Icon Frame">
                    <path id="Union"
                        d="M19.071 13.6421L13.4141 19.299C12.6331 20.08 11.3667 20.08 10.5857 19.299L4.92882 13.6421C2.9762 11.6895 2.9762 8.52369 4.92882 6.57106C6.88144 4.61844 10.0473 4.61844 11.9999 6.57106C13.9525 4.61844 17.1183 4.61844 19.071 6.57106C21.0236 8.52369 21.0236 11.6895 19.071 13.6421Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
            <p class="notice-text">Товар успешно добавлен в избранное</p>`;
                break;
            case "favoriteRemove":
                notice.innerHTML = `<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Icon Frame">
                    <path id="Union"
                        d="M19.071 13.6421L13.4141 19.299C12.6331 20.08 11.3667 20.08 10.5857 19.299L4.92882 13.6421C2.9762 11.6895 2.9762 8.52369 4.92882 6.57106C6.88144 4.61844 10.0473 4.61844 11.9999 6.57106C13.9525 4.61844 17.1183 4.61844 19.071 6.57106C21.0236 8.52369 21.0236 11.6895 19.071 13.6421Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
            <p class="notice-text">Товар удален из избранного</p>`;
                break;
            case "all-add":
                notice.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="send-ok__svg" viewBox="-105 197 400 400"><g><path id="Path-0" class="st0" d="M95 570.8c-95.8 0-173.8-78-173.8-173.8 0-95.8 77.9-173.8 173.8-173.8s173.8 78 173.8 173.8c0 95.8-78 173.8-173.8 173.8zM95 197c-110.3 0-200 89.7-200 200s89.7 200 200 200 200-89.7 200-200-89.7-200-200-200z"></path><g><path id="Path-1" class="st0" d="M167.4 331.5L64.3 434.6 22.6 393c-5.1-5.1-13.4-5.1-18.5 0s-5.1 13.4 0 18.5l51 51c2.6 2.6 5.9 3.8 9.3 3.8s6.7-1.3 9.3-3.8L186 350.1c5.1-5.1 5.1-13.4 0-18.5-5.2-5.2-13.5-5.2-18.6-.1z"></path></g></g></svg>
            <p class="notice-text">Товары успешно добавлены в корзину</p>`;
                break;
        }

        notice.classList.add("active");
        setTimeout(() => {
            notice.classList.remove("active");
        }, 3000);
    }

    /*FILTER*/
    const filterWidget = $('.filters-widget');
    const closeFilter = filterWidget.find('#close-filter');
    const openFilter = filterWidget.find('#open-filter');
    openFilter.click(() => {
        filterWidget.toggleClass('opened');
    })
    closeFilter.click(() => {
        filterWidget.removeClass('opened');
    })

    /*SIMPLE SCROLL*/
    Array.prototype.forEach.call(
        document.querySelectorAll('.simple-scroll-block'),
        (el) => new SimpleBar(el)
    );

    // const addonsSwiper = $('.wc-pao-addon-swiper');
    let swipers = document.querySelectorAll(".wc-pao-addon-swiper"); //Находим все слайдеры в tab'ах

    swipers.forEach(value => {
        let swiper = new Swiper(value, {
            slidesPerView: 4,
            spaceBetween: 30,
            init: false,
            navigation: {
                nextEl: value.querySelector('.swiper-btn-next'), //инициализируем кнопки управления у ДАННОГО слайдера через поиск querySelector()
                prevEl: value.querySelector('.swiper-btn-prev'), //инициализируем кнопки управления у ДАННОГО слайдера через поиск querySelector()
            },

            pagination: {
                el: value.querySelector(".swiper-pagination"), //инициализируем пагиницию у ДАННОГО слайдера через поиск querySelector()
                clickable: true,
            },

            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 15,

                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 30,

                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 30,

                },
            },
            observer: true,
            observerParents: true
        });

        swiper.init();
    });

    $('input[type=tel]').inputmask({"mask": "+7 999 999-99-99"}); //specifying options

    window.formPhoneValidator = function (input) {
        let tempInput = input.toString().replaceAll('_', '');
        tempInput = tempInput.replaceAll(' ', '');
        tempInput = tempInput.replaceAll('-', '');
        
        return tempInput.length === 12;
    }
    
    // $(document).scroll(function() {
    //     if ($(this).scrollTop() >= 50) {
    //     $('#header').addClass('painted');
    //     // console.log('scroll')
    //     }else{
    //     $('#header').removeClass('painted');
    //     }
    // });
    //

	// $("li.nav-menu-element a").click(function() { // ID откуда кливаем
	// 	let hash = $(this).attr('href');
	// 	if(hash.length > 1) {
	// 		$(this).parent().addClass('active');
	// 		$(this).parent().siblings().removeClass('active');
	// 		$('html, body').animate({
	//             scrollTop: $(hash).offset().top - 120 // класс объекта к которому приезжаем
	//         }, 1000); // Скорость прокрутки
	// 	}
	// });


    /*============ FUNCTIONS ===========*/

    // function getCallbackForm(modal, props) {
    //     let id = props['data-modal'].value;
    //     if($(modal).find('.form__holder').html() == '') {
    //         $.ajax({
    //             url: `/wp-admin/admin-ajax.php?action=get_modal_form&modal=${id}`,
    //             method: 'GET',
    //             success: function (data){
    //                 $(modal).find('.form__holder').html(data);
    //                 let form = $(modal).find('form').get(0);
                    
    //                 ThemeModal.reinitForms(form);
    //                 ThemeModal.getInstance().openModal(id);
    //             },
    //             error: function (data) {
    //                 ThemeModal.getInstance().openModal('error');
    //             }
    //         });
    //     }else{
    //         ThemeModal.getInstance().openModal(id);
    //     }
    // }
    
    let mobileMenu = new MobileMenu(); // Вызов объекта класса мобильного меню
    mobileMenu.init(); // Инициализация мобильного меню
    let themeModal = new ThemeModal({}); // Вызов объекта класса модалок
    
    // themeModal.modalsView['callback'] = {
    // 	callback: getCallbackForm
    // };
    themeModal.init(); // Инициализация модалок

});
