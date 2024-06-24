<?php
$item = $args['item'];
$item = get_term($item);
$link = get_term_link($item);
$name = $item->name;
$thumbnail_id = get_woocommerce_term_meta($item->term_id, 'thumbnail_id', true);
$image = wp_get_attachment_url($thumbnail_id);
?>
<a href="<?= $link; ?>" class="product-cat">
    <h4 class="product-cat__name">
        <?= $name; ?>
    </h4>

    <div class="product-cat__btn btn-circle primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none">
            <path d="M12 19L19 12L12 5M19 12L5 12" stroke="white" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="product-cat__thumbnail">
        <img src="<?= $image; ?>" alt="">
    </div>
</a>