<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$bg = wp_get_attachment_image_url(get_field('bg'), 'wide');
$block_title_additional = get_field('block_title_additional');
$block_title = get_field('block_title');
$text = get_field('text');
$btn = get_field('btn');
$btn_link = $btn['link'];
$btn_text = $btn['text'];
?>
<div id="delivery-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <?php if ($bg) { ?>
        <div class="block__bg-left">
            <img src="<?= $bg; ?>" alt="">
        </div>
    <?php } ?>

    <div class="block__content">
        <?php if ($block_title) { ?>
            <h2 class="block__title">
                <?php if ($block_title_additional) { ?>
                    <div class="block__title-additional"><?= $block_title_additional; ?></div>
                <?php } ?>

                <?= $block_title; ?>
            </h2>
        <?php } ?>

        <?php if ($text) {?>
            <div class="block__text p2">
                <?= $text; ?>
            </div>
        <?php } ?>
        
        <?php if ($btn_text || $btn_link) {?>
            <a href="<?= $btn_link; ?>" class="btn"><?= $btn_text; ?></a>
        <?php } ?>
    </div>

    <div class="block__bg-right">
        <img src="<?= get_theme_file_uri(); ?>/inc/blocks/delivery-block/images/bg.png" alt="">
    </div>
</div>