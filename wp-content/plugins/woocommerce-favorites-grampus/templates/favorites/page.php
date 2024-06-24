<?php
global $wp_query;

get_header();

$products = WCFAVORITES()->get_products();

$totalPrices = 0;
$totalOldPrices = 0;
?>
    <div class="favorites-page woocommerce-cart woocommerce">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>
            <?php if ($products) { ?>
                <div class="woocommerce-cart-wrapper block-margin">
                    <table class="woocommerce-cart-form__contents">
                        <tbody>
                        <?php foreach ($products as $item) {
                            $product = wc_get_product($item);

                            $post_object = get_post($product->get_id());

                            setup_postdata($GLOBALS['post'] =& $post_object);

                            $_product = wc_get_product($item);
                            $product_id = $_product->get_id();
                            /**
                             * Filter the product name.
                             *
                             * @param string $product_name Name of the product in the cart.
                             * @param array $cart_item The product in the cart.
                             * @param string $cart_item_key Key for the product in the cart.
                             * @since 2.1.0
                             */
                            $product_name = $_product->get_name();

                            $product_permalink = $_product->get_permalink();
                            ?>
                            <tr class="woocommerce-cart-form__cart-item" data-product-id="<?= $product_id; ?>">
                                <td class="product-info">

                                    <div class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image());

                                        if (!$product_permalink) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </div>

                                    <div class="product-text">
                                        <div class="product-name"
                                             data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                            <?php
                                            if (!$product_permalink) {
                                                echo wp_kses_post($product_name . '&nbsp;');
                                            } else {
                                                /**
                                                 * This filter is documented above.
                                                 *
                                                 * @since 2.1.0
                                                 */
                                                echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name())));
                                            }
                                            ?>
                                        </div>

                                        <?php $additional_text = get_field('additional_text', $product->get_id());
                                        if ($additional_text) { ?>
                                            <div class="product-additional-text p3"><?= $additional_text; ?></div>
                                        <?php } ?>

                                        <div class="product-price"
                                             data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                            <?php echo do_action('favorite_item_price'); ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-btns">
                                    <?= woocommerce_template_loop_add_to_cart();
                                    global $product;
                                    $in_favorites = WCFAVORITES()->check_item($product->get_id());
                                    $text = get_option('favorites_category_product_text', 'В избранные');
                                    ?>

                                    <button type="button" data-product_id="<?= $product->get_id() ?>"
                                            class="favorites ajax_add_to_favorites btn-circle card <?php if ($in_favorites) {
                                                echo 'added';
                                            } ?>" aria-label="<?= $text ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path d="M19.0714 13.1421L13.4146 18.799C12.6335 19.58 11.3672 19.58 10.5862 18.799L4.92931 13.1421C2.97669 11.1895 2.97669 8.02369 4.92931 6.07107C6.88193 4.11845 10.0478 4.11845 12.0004 6.07107C13.953 4.11845 17.1188 4.11845 19.0714 6.07107C21.0241 8.02369 21.0241 11.1895 19.0714 13.1421Z"
                                                  stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        <?php }
                        wp_reset_postdata(); ?>
                        </tbody>
                    </table>

                    <div class="cart-collaterals">
                        <div class="cart_totals">
                            <div class="item-info count cart-count">
                                <h5 class="item-title count__title">
                                    Товаров в избранном
                                </h5>

                                <h5 class="item-value count__number">
                                    <?= WCFAVORITES()->count_items(); ?>
                                </h5>
                            </div>

                            <form action="<?= get_permalink(get_the_ID()); ?>">
                                <button type="submit" class="clear-fav p3" name="clear-fav">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 7L17 17M7 17L17 7" stroke="#959595" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    Очистить избранное
                                </button>
                            </form>

                            <?php if ($products) {
                                $has_variable_product = false;
                                foreach ($products as $product) {
                                    $_product = wc_get_product($product);
                                    if ($_product->is_type('variable')) {
                                        $has_variable_product = true;
                                        break;
                                    }
                                }

                                if (!$has_variable_product) {
                                    ?>
                                    <div id="add_all_to_cart" class="btn-mini">Добавить все в корзину</div>
                                    <?php
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="not-founded">
                    Товаров в избранном нет!
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        jQuery(function ($) {
            $('body').on('removed_from_favorites', function () {
                location.reload();
            });

            const btn = $('.favorites-page #add_all_to_cart');
            btn.click(function () {
                let products = $('.favorites-page .woocommerce-cart-form__cart-item');
                let products_ids = [];
                products.each(function () {
                    let product_data_id = $(this).data('product-id');
                    products_ids.push(product_data_id);
                })
                console.log(products_ids);

                $.ajax({
                    type: 'POST',
                    url: '/wp-admin/admin-ajax.php',
                    data: {
                        action: 'all_favorites_add_to_cart',
                        products_ids: products_ids,
                    },
                    beforeSend: function (xhr) {
                    },
                    success: function (response) {
                    }
                });
            })
        });
    </script>
<?php
get_footer();