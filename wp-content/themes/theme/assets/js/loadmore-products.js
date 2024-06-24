jQuery(document).ready(function ($) {
    //-----------------------------------------------------
    // [2] Ajax load products - On Click
    //-----------------------------------------------------
    $('#pp_loadmore_products').click(function () {

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': wp_js_vars.posts, // that's how we get params from wp_localize_script() function
                'page': wp_js_vars.current_page
            };

        $.ajax({
            url: wp_js_vars.ajaxurl, // AJAX handler
            data: data,
            related_products: 'no',
            type: 'POST',
            beforeSend: function (xhr) {
                $('.archive__holder-products .products').addClass('loading');
                button.addClass('loading');
                button.text('Загрузка'); // change the button text, you can also add a preloader image
            },
            success: function (data) {
                if (data) {
                    //console.log('current_page: ' + wp_js_vars.current_page + ' max_page: ' + wp_js_vars.max_page);
                    $('.archive__holder-products .products').append(data); // where to insert posts
                    $('.archive__holder-products .products').removeClass('loading');
                    button.removeClass('loading');
                    button.text('Показать еще');
                    wp_js_vars.current_page++;

                    if (wp_js_vars.current_page == wp_js_vars.max_page)
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });

});
