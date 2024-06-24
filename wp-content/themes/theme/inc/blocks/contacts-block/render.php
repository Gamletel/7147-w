<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$phones = @settings('phones');
$additionals = @settings('additional');
$emails = @settings('emails');
$addresses = @settings('addresses');
$socials = @settings('socials');
$show_map = get_field('show_map');

?>
<div id="contacts-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <div class="bg-left">
        <img src="<?= get_theme_file_uri(); ?>/inc/blocks/contacts-block/images/bg-left.png" alt="">
    </div>

    <div class="bg-right">
        <img src="<?= get_theme_file_uri(); ?>/inc/blocks/contacts-block/images/bg-right.png" alt="">
    </div>

    <div class="container">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>

        <div class="contacts">
            <?php if (!empty($phones) || is_array($phones)) { ?>
                <?php foreach ($phones as $item) {
                    $name = $item['name'];
                    $value = $item['value'];
                    ?>
                    <div class="contact">
                        <?php if ($name) { ?>
                            <div class="contact__name p2"><?= $name; ?></div>
                        <?php } ?>

                        <?php if ($value) { ?>
                            <a href="tel:<?= $value; ?>" class="contact__value"><?= $value; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if (!empty($emails) || is_array($emails)) { ?>
                <?php foreach ($emails as $item) {
                    $name = $item['name'];
                    $value = $item['value'];
                    ?>
                    <div class="contact">
                        <?php if ($name) { ?>
                            <div class="contact__name p2"><?= $name; ?></div>
                        <?php } ?>

                        <?php if ($value) { ?>
                            <a href="mailto:<?= $value; ?>" class="contact__value"><?= $value; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if (!empty($additionals) || is_array($additionals)) { ?>
                <?php foreach ($additionals as $item) {
                    $name = $item['title'];
                    $value = $item['value'];
                    ?>
                    <div class="contact">
                        <?php if ($name) { ?>
                            <div class="contact__name p2"><?= $name; ?></div>
                        <?php } ?>

                        <?php if ($value) { ?>
                            <div class="contact__value"><?= $value; ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if (!empty($socials) || is_array($socials)) { ?>
                <div class="socials">
                    <?php foreach ($socials as $social) {
                        $value = $social['value'];
                        $icon = wp_get_attachment_image_url($social['icon'], 'wide');
                        ?>
                        <a href="<?= $value; ?>" class="social btn-circle">
                            <img src="<?= $icon; ?>" alt="" class="style-svg">
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($addresses) || is_array($addresses)) { ?>
                <div class="addresses">
                    <?php foreach ($addresses as $item) {
                        $name = $item['name'];
                        $value = $item['value'];
                        ?>
                        <div class="contact">
                            <?php if ($name) { ?>
                                <div class="contact__name p2"><?= $name; ?></div>
                            <?php } ?>

                            <?php if ($value) { ?>
                                <div class="contact__value"><?= $value; ?></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php if ($show_map) { ?>
            <div class="map">
                <?php render_map() ?>
            </div>
        <?php } ?>
    </div>
</div>