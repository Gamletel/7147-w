<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = $args['block_title'] ?? get_field('block_title');
$block_subtitle = $args['block_subtitle'] ?? get_field('block_subtitle');
$image = $args['image'] ?? get_field('image');
if ($image) {
    $image_url = wp_get_attachment_image_url($image, 'full');
}
?>
<div id="form-block" class="block-margin alignfull">
    <div class="block__bg">
        <img src="<?= get_theme_file_uri(); ?>/inc/blocks/form-block/images/bg.png" alt="">
    </div>

    <div class="container">
        <div class="block__form">
            <?php if ($block_title) { ?>
                <h2 class="block-title"><?= $block_title; ?></h2>
            <?php } ?>

            <?php if ($block_subtitle) { ?>
                <h4 class="block__subtitle"><?= $block_subtitle; ?></h4>
            <?php } ?>

            <?php get_form('callback') ?>

            <div class="form__bg">
                <img src="<?= get_theme_file_uri(); ?>/inc/blocks/form-block/images/pomidor.png" alt="">
            </div>
        </div>
    </div>

    <?php if ($image) { ?>
        <div class="block__image">
            <img src="<?= $image_url; ?>" alt="">
        </div>
    <?php } ?>
</div>