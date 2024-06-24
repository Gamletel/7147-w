<?php
global $product;

$in_favorites = WCFAVORITES()->check_item($product->get_id());
$text = get_option('favorites_single_product_text', 'В избранные');
?>
<button type="button" data-product_id="<?= $product->get_id() ?>"
        class="favorites single_add_to_favorites_button ajax_add_to_favorites button alt <?php if ($in_favorites) {
            echo 'added';
        } ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M19.0714 13.1421L13.4146 18.799C12.6335 19.58 11.3672 19.58 10.5862 18.799L4.92931 13.1421C2.97669 11.1895 2.97669 8.02369 4.92931 6.07107C6.88193 4.11845 10.0478 4.11845 12.0004 6.07107C13.953 4.11845 17.1188 4.11845 19.0714 6.07107C21.0241 8.02369 21.0241 11.1895 19.0714 13.1421Z"
              stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>