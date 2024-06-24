<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$images = get_field('images');
$max_index = 6;
$cur_index = 0;
?>
<?php if (!empty($images) || is_array($images)) { ?>
    <div id="gallery-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $key => $image) {
                        $cur_index++;
                        $image_full = wp_get_attachment_image_url($image, 'full');
                        $image_wide = wp_get_attachment_image_url($image, 'wide');
                        ?>
                        <?php if ($cur_index == 1) { ?>
                            <div class="swiper-slide">
                                <div class="images">
                        <?php } ?>
                                    <div class="image n<?= $cur_index ?>" data-fancybox='gallery' data-src='<?= $image_full; ?>'>
                                        <img src="<?= $image_wide; ?>" alt="">
                                    </div>
                        <?php
                        if ($cur_index == $max_index || $cur_index == count($images)) { ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($cur_index == $max_index) $cur_index = 0;
                    } ?>
                </div>
            </div>

            <div class="swiper-additionals">
                <div class="swiper-btns">
                    <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                    <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
<?php } ?>
