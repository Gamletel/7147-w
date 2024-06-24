<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_style = get_field('block_style');
$block_title = get_field('block_title');
$text = get_field('text');
$image = wp_get_attachment_image_url(get_field('image'), 'wide');
?>
<?php if ($text) { ?>
    <div id="text-block" class="block-margin block-<?= $block_style; ?> <?= $classes; ?> <?= $align; ?>">
        <?php switch ($block_style) {
            case 'row': ?>
                <?php if ($image) { ?>
                    <div class="block-row__image">
                        <img src="<?= $image; ?>" alt="">
                    </div>

                    <div class="block-row__content">
                        <?php if ($block_title) { ?>
                            <h2 class="block-title"><?= $block_title; ?></h2>
                        <?php } ?>

                        <div class="block-row__text text-block p1"><?= $text; ?></div>
                    </div>
                <?php } ?>
                <?php
                break;

            case 'row-reverse': ?>
                <div class="container">
                    <div class="block-row-reverse__wrapper">
                        <div class="block-row-reverse__content">
                            <?php if ($block_title) { ?>
                                <h2 class="block-title"><?= $block_title; ?></h2>
                            <?php } ?>

                            <div class="block-row-reverse__text text-block p1"><?= $text; ?></div>
                        </div>

                        <?php if ($image) { ?>
                            <div class="block-row-reverse__image"><img src="<?= $image; ?>" alt=""></div>
                        <?php } ?>
                    </div>
                </div>
                <?php break;
        } ?>
    </div>
<?php } ?>
