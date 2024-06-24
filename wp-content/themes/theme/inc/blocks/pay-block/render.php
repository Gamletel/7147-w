<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$tabs = get_field('tabs');
?>
<?php if (!empty($tabs) && is_array($tabs)) { ?>
    <div id="pay-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="bg">
            <img src="<?= get_theme_file_uri(); ?>/inc/blocks/pay-block/images/bg.png" alt="">
        </div>

        <div class="container">
            <?php if ($block_title) {?>
                <h2 class="block-title"><?= $block_title; ?></h2>
            <?php } ?>

            <div class="tabs">
                <?php foreach ($tabs as $tab) {
                    $title = $tab['title'];
                    $text = $tab['text'];
                    ?>
                    <div class="tab">
                        <?php if ($title) {?>
                        <h4 class="tab__title"><?= $title; ?></h4>
                        <?php } ?>
                        
                        <?php if ($text) {?>
                            <div class="tab__text p2"><?= $text; ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
